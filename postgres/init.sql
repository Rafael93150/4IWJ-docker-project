DROP TABLE IF EXISTS todo;

CREATE TABLE todo (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

INSERT INTO todo (name) VALUES ('Faire les courses');
INSERT INTO todo (name) VALUES ('Faire le ménage');
INSERT INTO todo (name) VALUES ('Répondre aux e-mails');

-- CREATE TABLE todo (
--     id SERIAL PRIMARY KEY,
--     name VARCHAR(255) NOT NULL,
--     completed BOOLEAN NOT NULL DEFAULT false
-- );

-- INSERT INTO todo (name, completed) VALUES ('Faire les courses', false);
-- INSERT INTO todo (name, completed) VALUES ('Faire le ménage', true);
-- INSERT INTO todo (name, completed) VALUES ('Répondre aux e-mails', false);