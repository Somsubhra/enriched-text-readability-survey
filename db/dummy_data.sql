USE ETRS;

INSERT INTO passage_set(`id`) VALUES
(1), (2), (3), (4);

INSERT INTO passage(`id`, `content`, `set_id`) VALUES
(1, 'Content for passage 1 of set 1', 1),
(2, 'Content for passage 2 of set 1', 1),
(1, 'Content for passage 1 of set 2', 2),
(2, 'Content for passage 2 of set 2', 2),
(1, 'Content for passage 1 of set 3', 3),
(2, 'Content for passage 2 of set 3', 3),
(1, 'Content for passage 1 of set 4', 4),
(2, 'Content for passage 2 of set 4', 4);