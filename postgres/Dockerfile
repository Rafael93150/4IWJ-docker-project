FROM postgres:alpine

ENV POSTGRES_DB projet
ENV POSTGRES_USER postgres
ENV POSTGRES_PASSWORD postgres

# Add ToDo data
COPY projet-script.sql /docker-entrypoint-initdb.d/
RUN apk add --no-cache postgresql-client

CMD ["postgres"]

EXPOSE 5432