CREATE TABLE IF NOT EXISTS robot_state (
    id INT PRIMARY KEY,
    command VARCHAR(10) NOT NULL DEFAULT 'S'
);

INSERT INTO robot_state (id, command)
VALUES (1, 'S')
ON DUPLICATE KEY UPDATE id = id;
