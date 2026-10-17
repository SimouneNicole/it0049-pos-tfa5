#!/usr/bin/env bash
set -e

DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
TMP_DIR="/tmp/simoune-tfa5-deploy-$$"
OUTPUT_ZIP="$DIR/it0049-pos-tfa5-infinityfree.zip"

echo "==> Packaging lean production build for InfinityFree (it0049-tfa5.freehosting.dev)..."
rm -rf "$TMP_DIR" "$OUTPUT_ZIP"
mkdir -p "$TMP_DIR"

# Copy non-hidden source files, excluding development directories and archives
rsync -av \
  --exclude=".*" \
  --exclude="vendor" \
  --exclude="node_modules" \
  --exclude="tests" \
  --exclude="*.zip" \
  --exclude="build-infinityfree-zip.sh" \
  --exclude="deploy-infinityfree.sh" \
  "$DIR/" "$TMP_DIR/" > /dev/null

# Copy essential root configuration files
[ -f "$DIR/.htaccess" ] && cp "$DIR/.htaccess" "$TMP_DIR/.htaccess"
[ -f "$DIR/index.php" ] && cp "$DIR/index.php" "$TMP_DIR/index.php"
[ -f "$DIR/public/.htaccess" ] && cp "$DIR/public/.htaccess" "$TMP_DIR/public/.htaccess"

# Mirror static assets to root for dual-resolution on shared hosting
if [ -d "$DIR/public/css" ]; then
    mkdir -p "$TMP_DIR/css"
    cp -r "$DIR/public/css/"* "$TMP_DIR/css/"
fi

[ -f "$DIR/public/favicon.ico" ] && cp "$DIR/public/favicon.ico" "$TMP_DIR/favicon.ico"

# Use production env template
if [ -f "$DIR/env.production" ]; then
    cp "$DIR/env.production" "$TMP_DIR/.env"
fi

# Ensure SQLite database and SQL schema export are included
if [ -f "$DIR/database/database.sqlite" ]; then
    mkdir -p "$TMP_DIR/database"
    cp "$DIR/database/database.sqlite" "$TMP_DIR/database/database.sqlite"
fi

if [ -f "$DIR/database/schema_export.sql" ]; then
    mkdir -p "$TMP_DIR/database"
    cp "$DIR/database/schema_export.sql" "$TMP_DIR/database/schema_export.sql"
fi

# Ensure storage directories exist with proper structure
mkdir -p "$TMP_DIR/storage/app/public" \
         "$TMP_DIR/storage/framework/cache/data" \
         "$TMP_DIR/storage/framework/sessions" \
         "$TMP_DIR/storage/framework/views" \
         "$TMP_DIR/storage/logs" \
         "$TMP_DIR/bootstrap/cache"

# Install lean production vendor dependencies (excluding development tools)
cd "$TMP_DIR"
composer install --no-dev --optimize-autoloader --no-interaction --quiet

# Create deployment archive
zip -r "$OUTPUT_ZIP" . -x "*.DS_Store" > /dev/null
rm -rf "$TMP_DIR"

# Validate package integrity
echo "==> Verifying package contents..."
for req in "public/index.php" "index.php" ".htaccess" "public/.htaccess" "artisan" "vendor/autoload.php" "public/css/style.css" "css/style.css" ".env" "database/database.sqlite" "database/schema_export.sql"; do
    if ! unzip -l "$OUTPUT_ZIP" | grep -q "$req"; then
        echo "Error: Required file $req is missing from $OUTPUT_ZIP" >&2
        exit 1
    fi
done

echo "==> Verification passed! All required files and dual-path assets are present."
echo "==> Build successful: $OUTPUT_ZIP"
ls -lh "$OUTPUT_ZIP"
