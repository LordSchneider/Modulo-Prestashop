ALTER TABLE `PREFIX_mymod_comment` ADD `nombre` VARCHAR(255) NOT NULL
AFTER `id_product`, ADD `apellido` VARCHAR(255) NOT NULL AFTER `nombre`,
ADD `email` VARCHAR(255) NOT NULL AFTER `apellido`
