DROP TABLE IF EXISTS todo;

CREATE TABLE todo (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

INSERT INTO todo (name) VALUES ('Faire les courses');
INSERT INTO todo (name) VALUES ('Faire le ménage');
INSERT INTO todo (name) VALUES ('Répondre aux e-mails');
INSERT INTO todo (name) VALUES ('Préparer la réunion');
INSERT INTO todo (name) VALUES ('Faire la vaisselle');
INSERT INTO todo (name) VALUES ('Aller chez le médecin');
INSERT INTO todo (name) VALUES ('Réserver le vol');
INSERT INTO todo (name) VALUES ('Réparer la machine à laver');
INSERT INTO todo (name) VALUES ('Préparer le dîner');
INSERT INTO todo (name) VALUES ('Sortir les poubelles');

-- CREATE TABLE todo (
--     id SERIAL PRIMARY KEY,
--     name VARCHAR(255) NOT NULL,
--     completed BOOLEAN NOT NULL DEFAULT false
-- );

-- INSERT INTO todo (name, completed) VALUES ('Faire les courses', false);
-- INSERT INTO todo (name, completed) VALUES ('Faire le ménage', true);
-- INSERT INTO todo (name, completed) VALUES ('Répondre aux e-mails', false);