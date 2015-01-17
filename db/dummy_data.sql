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

INSERT INTO question(`id`, `content`, `passage_id`, `set_id`) VALUES
(1, 'Question 1 of passage 1 of set 1', 1, 1),
(2, 'Question 2 of passage 1 of set 1', 1, 1),
(1, 'Question 1 of passage 2 of set 1', 2, 1),
(2, 'Question 2 of passage 2 of set 1', 2, 1),
(1, 'Question 1 of passage 1 of set 2', 1, 2),
(2, 'Question 2 of passage 1 of set 2', 1, 2),
(1, 'Question 1 of passage 2 of set 2', 2, 2),
(2, 'Question 2 of passage 2 of set 2', 2, 2),
(1, 'Question 1 of passage 1 of set 3', 1, 3),
(2, 'Question 2 of passage 1 of set 3', 1, 3),
(1, 'Question 1 of passage 2 of set 3', 2, 3),
(2, 'Question 2 of passage 2 of set 3', 2, 3),
(1, 'Question 1 of passage 1 of set 4', 1, 4),
(2, 'Question 2 of passage 1 of set 4', 1, 4),
(1, 'Question 1 of passage 2 of set 4', 2, 4),
(2, 'Question 2 of passage 2 of set 4', 2, 4);

INSERT INTO choice(`id`, `content`, `question_id`, `passage_id`, `set_id`) VALUES
(1, 'Option 1', 1, 1, 1),
(2, 'Option 2', 1, 1, 1),
(1, 'Option 1', 2, 1, 1),
(2, 'Option 2', 2, 1, 1),
(1, 'Option 1', 1, 2, 1),
(2, 'Option 2', 1, 2, 1),
(1, 'Option 1', 2, 2, 1),
(2, 'Option 2', 2, 2, 1),
(1, 'Option 1', 1, 1, 2),
(2, 'Option 2', 1, 1, 2),
(1, 'Option 1', 2, 1, 2),
(2, 'Option 2', 2, 1, 2),
(1, 'Option 1', 1, 2, 2),
(2, 'Option 2', 1, 2, 2),
(1, 'Option 1', 2, 2, 2),
(2, 'Option 2', 2, 2, 2),
(1, 'Option 1', 1, 1, 3),
(2, 'Option 2', 1, 1, 3),
(1, 'Option 1', 2, 1, 3),
(2, 'Option 2', 2, 1, 3),
(1, 'Option 1', 1, 2, 3),
(2, 'Option 2', 1, 2, 3),
(1, 'Option 1', 2, 2, 3),
(2, 'Option 2', 2, 2, 3),
(1, 'Option 1', 1, 1, 4),
(2, 'Option 2', 1, 1, 4),
(1, 'Option 1', 2, 1, 4),
(2, 'Option 2', 2, 1, 4),
(1, 'Option 1', 1, 2, 4),
(2, 'Option 2', 1, 2, 4),
(1, 'Option 1', 2, 2, 4),
(2, 'Option 2', 2, 2, 4);