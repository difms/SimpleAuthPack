#!/bin/sh

set -e

host="$DB_HOST"
user="$DB_USERNAME"
password="$DB_PASSWORD"
dbname="$DB_DATABASE"

echo "Waiting for PostgreSQL..."

while ! pg_isready -h "$host" -p "$DB_PORT" -U "$user"; do
  sleep 1
done

echo "PostgreSQL is up - executing command"
exec "$@"
