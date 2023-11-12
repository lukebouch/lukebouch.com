# Use the official Node.js image as the base image
FROM node:20 AS build

# Set the working directory
WORKDIR /app

# Copy the package.json and yarn.lock files to the working directory
COPY package.json yarn.lock ./

# Install dependencies using Yarn
RUN yarn install

# Copy the rest of the application code to the working directory
COPY . .

# Build the Astro site
RUN yarn build

# Use the official Caddy image as the base image for serving
FROM caddy:2

# Set the working directory in the Caddy image
WORKDIR /site

# Copy the built site from the build stage to the Caddy image
COPY --from=build /app/dist .

# Copy the Caddyfile from the repository to the Caddy image
COPY Caddyfile .

# Expose the default Caddy port
EXPOSE 80

# Start Caddy to serve the static site
CMD ["caddy", "run", "--config", "Caddyfile", "--adapter", "caddyfile"]
