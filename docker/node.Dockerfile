FROM node:20-bookworm-slim

# strumenti minimi per moduli nativi / healthcheck
RUN apt-get update && apt-get install -y --no-install-recommends \
    git python3 make g++ curl ca-certificates \
 && rm -rf /var/lib/apt/lists/*

USER node
WORKDIR /var/www/html
