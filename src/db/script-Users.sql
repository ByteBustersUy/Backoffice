-- ---------------- --
-- usuario ecomerse --
-- ---------------- --
CREATE USER 'undefinedUser'@'%';

GRANT SELECT ON *.* TO 'undefinedUser'@'%' REQUIRE NONE;

-- para borrar el usuario
-- -> DROP USER 'undefinedUser'@'%';



-- ----------------------------------------------------------------------------------------



-- ------------------ --
-- usuario trabajador --
-- ------------------ --
CREATE USER 'workerUser'@'%' IDENTIFIED BY '1234';

GRANT SELECT, INSERT, UPDATE ON *.* TO 'workerUser'@'%' REQUIRE NONE;


-- para borrar el usuario
-- -> DROP USER 'workerUser'@'%';