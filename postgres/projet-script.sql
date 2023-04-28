DROP TABLE IF EXISTS todo;

CREATE TABLE todo (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    completed BOOLEAN NOT NULL DEFAULT false
);

INSERT INTO todo (name, completed) VALUES ('Faire les courses', false);
INSERT INTO todo (name, completed) VALUES ('Faire le ménage', true);
INSERT INTO todo (name, completed) VALUES ('Répondre aux e-mails', false);