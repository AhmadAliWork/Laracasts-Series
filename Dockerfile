FROM node:latest

# Setting up work directory
WORKDIR /home/server

# Install json server
RUN npm install -g json-server

# copy local files to docker working directory
COPY db.json /home/server/db.json

COPY alt.json /home/server/alt.json

EXPOSE 3000
# CMD and Enterypoint command are use to execute the commands
ENTRYPOINT ["json-server", "---host", "0.0.0.0"]

CMD ["db.json"]