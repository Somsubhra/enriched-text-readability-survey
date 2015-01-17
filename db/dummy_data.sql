USE ETRS;

INSERT INTO question_set(`id`) VALUES
(1), (2), (3), (4);

INSERT INTO question(`id`, `content`, `set_id`) VALUES
(1, 'Content for question 1 of set 1', 1),
(2, 'Content for question 2 of set 1', 1),
(3, 'Content for question 3 of set 1', 1),
(4, 'Content for question 4 of set 1', 1),
(5, 'Content for question 5 of set 1', 1),
(6, 'Content for question 6 of set 1', 1),
(7, 'Content for question 7 of set 1', 1),
(8, 'Content for question 8 of set 1', 1),
(1, 'Content for question 1 of set 2', 2),
(2, 'Content for question 2 of set 2', 2),
(3, 'Content for question 3 of set 2', 2),
(4, 'Content for question 4 of set 2', 2),
(5, 'Content for question 5 of set 2', 2),
(6, 'Content for question 6 of set 2', 2),
(7, 'Content for question 7 of set 2', 2),
(8, 'Content for question 8 of set 2', 2),
(1, 'Content for question 1 of set 3', 3),
(2, 'Content for question 2 of set 3', 3),
(3, 'Content for question 3 of set 3', 3),
(4, 'Content for question 4 of set 3', 3),
(5, 'Content for question 5 of set 3', 3),
(6, 'Content for question 6 of set 3', 3),
(7, 'Content for question 7 of set 3', 3),
(8, 'Content for question 8 of set 3', 3),
(1, 'Content for question 1 of set 4', 4),
(2, 'Content for question 2 of set 4', 4),
(3, 'Content for question 3 of set 4', 4),
(4, 'Content for question 4 of set 4', 4),
(5, 'Content for question 5 of set 4', 4),
(6, 'Content for question 6 of set 4', 4),
(7, 'Content for question 7 of set 4', 4),
(8, 'Content for question 8 of set 4', 4);

INSERT INTO choice(`id`, `content`, `question_id`, `set_id`) VALUES
(1, 'option 1', 1, 1),
(2, 'option 2', 1, 1),
(3, 'option 3', 1, 1),
(1, 'option 1', 2, 1),
(2, 'option 2', 2, 1),
(3, 'option 3', 2, 1),
(1, 'option 1', 3, 1),
(2, 'option 2', 3, 1),
(3, 'option 3', 3, 1),
(1, 'option 1', 4, 1),
(2, 'option 2', 4, 1),
(3, 'option 3', 4, 1),
(1, 'option 1', 5, 1),
(2, 'option 2', 5, 1),
(3, 'option 3', 5, 1),
(1, 'option 1', 6, 1),
(2, 'option 2', 6, 1),
(3, 'option 3', 6, 1),
(1, 'option 1', 7, 1),
(2, 'option 2', 7, 1),
(3, 'option 3', 7, 1),
(1, 'option 1', 8, 1),
(2, 'option 2', 8, 1),
(3, 'option 3', 8, 1),
(1, 'option 1', 1, 2),
(2, 'option 2', 1, 2),
(3, 'option 3', 1, 2),
(1, 'option 1', 2, 2),
(2, 'option 2', 2, 2),
(3, 'option 3', 2, 2),
(1, 'option 1', 3, 2),
(2, 'option 2', 3, 2),
(3, 'option 3', 3, 2),
(1, 'option 1', 4, 2),
(2, 'option 2', 4, 2),
(3, 'option 3', 4, 2),
(1, 'option 1', 5, 2),
(2, 'option 2', 5, 2),
(3, 'option 3', 5, 2),
(1, 'option 1', 6, 2),
(2, 'option 2', 6, 2),
(3, 'option 3', 6, 2),
(1, 'option 1', 7, 2),
(2, 'option 2', 7, 2),
(3, 'option 3', 7, 2),
(1, 'option 1', 8, 2),
(2, 'option 2', 8, 2),
(3, 'option 3', 8, 2),
(1, 'option 1', 1, 3),
(2, 'option 2', 1, 3),
(3, 'option 3', 1, 3),
(1, 'option 1', 2, 3),
(2, 'option 2', 2, 3),
(3, 'option 3', 2, 3),
(1, 'option 1', 3, 3),
(2, 'option 2', 3, 3),
(3, 'option 3', 3, 3),
(1, 'option 1', 4, 3),
(2, 'option 2', 4, 3),
(3, 'option 3', 4, 3),
(1, 'option 1', 5, 3),
(2, 'option 2', 5, 3),
(3, 'option 3', 5, 3),
(1, 'option 1', 6, 3),
(2, 'option 2', 6, 3),
(3, 'option 3', 6, 3),
(1, 'option 1', 7, 3),
(2, 'option 2', 7, 3),
(3, 'option 3', 7, 3),
(1, 'option 1', 8, 3),
(2, 'option 2', 8, 3),
(3, 'option 3', 8, 3),
(1, 'option 1', 1, 4),
(2, 'option 2', 1, 4),
(3, 'option 3', 1, 4),
(1, 'option 1', 2, 4),
(2, 'option 2', 2, 4),
(3, 'option 3', 2, 4),
(1, 'option 1', 3, 4),
(2, 'option 2', 3, 4),
(3, 'option 3', 3, 4),
(1, 'option 1', 4, 4),
(2, 'option 2', 4, 4),
(3, 'option 3', 4, 4),
(1, 'option 1', 5, 4),
(2, 'option 2', 5, 4),
(3, 'option 3', 5, 4),
(1, 'option 1', 6, 4),
(2, 'option 2', 6, 4),
(3, 'option 3', 6, 4),
(1, 'option 1', 7, 4),
(2, 'option 2', 7, 4),
(3, 'option 3', 7, 4),
(1, 'option 1', 8, 4),
(2, 'option 2', 8, 4),
(3, 'option 3', 8, 4);