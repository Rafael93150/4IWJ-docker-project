FROM alpine

RUN apk add --no-cache postgresql postgresql-contrib su-exec

COPY init.sql /docker-entrypoint-initdb.d/

USER root
RUN mkdir -p /run/postgresql && \
    chown -R postgres:postgres /run/postgresql && \
    mkdir -p /usr/local/pgsql/data && \
    chown -R postgres:postgres /usr/local/pgsql/data

USER postgres
RUN initdb -D /usr/local/pgsql/data

EXPOSE 5432

CMD ["postgres", "-D", "/usr/local/pgsql/data"]