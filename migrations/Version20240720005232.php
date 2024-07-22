<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240720005232 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'создание таблицы employee';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE employee (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, position VARCHAR(255) NOT NULL, salary INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('INSERT INTO employee (name, position, salary) VALUES ("Нечаев Максим","Инженер",150000),("Волков Василий","Директор",240000),("Степанов Илья","Охранник",50000),("Морозов Максим","Инженер",120000),("Титов Мирон","Младший инженер",70000),("Глебов Тимофей","Сметчик",800000),("Орлов Александр","Слесарь",100000),("Харитонов Максим","Сантехник",60000),("Dmitry Egorov","ingeneer",100000)
');

    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE employee');
    }
}
