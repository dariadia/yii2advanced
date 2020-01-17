ALTER TABLE task 
    ADD CONSTRAINT fk_author_id
        FOREIGN KEY (author_id) REFERENCES user(id);


ALTER TABLE project 
DROP COLUMN parent_project_id



DROP TABLE project


INSERT INTO `user`
    (
    username,
    auth_key,
    password_hash,
    password_reset_token,
    email,
    status,
    created_at,
    updated_at,
    verification_token
    )
VALUES
    ('fdsgfd', 'f4fsdfsd', 'fdsgsafd', 'fadfsd432fadsfs', '24qrafds@mail.ru', 3, 124124124, 41412412, 'sf23qf');



INSERT INTO project
    (
    title,
    description,
    priority_id,
    status,
    created_at,
    updated_at
    )
VALUES
    ('very', 'f4fsdfsd', 2, 1, 124124124, 41412412);