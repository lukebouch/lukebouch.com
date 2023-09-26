# Adjust NODE_VERSION as desired
ARG NODE_VERSION=20.6.1
FROM node:${NODE_VERSION}-slim as base

LABEL fly_launch_runtime="NodeJS"

# NodeJS app lives here
WORKDIR /app

# Set production environment
ENV NODE_ENV=production

# Install packages needed to build node modules
RUN apt-get update -qq && \
    apt-get install -y python-is-python3 pkg-config build-essential

# Copy and install node modules
COPY package.json yarn.lock ./
RUN yarn install

# Copy application code
COPY . .

# Build application
RUN yarn run build

# Final stage for app image
FROM node:${NODE_VERSION}-slim

# Copy built application from the previous stage
WORKDIR /app
COPY --from=base /app /app

# Start the server by default, this can be overwritten at runtime
CMD [ "yarn", "run", "start" ]
