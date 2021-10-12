<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211012204030 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE car_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE car_category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE customer_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE location_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE rental_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE reservation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE car (id INT NOT NULL, category_id_id INT NOT NULL, brand VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, production_year INT NOT NULL, mileage INT NOT NULL, color VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_773DE69D9777D11E ON car (category_id_id)');
        $this->addSql('CREATE TABLE car_category (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE customer (id INT NOT NULL, name VARCHAR(255) NOT NULL, birth_date DATE NOT NULL, driving_lincense_number VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE location (id INT NOT NULL, city VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE rental (id INT NOT NULL, customer_id_id INT NOT NULL, car_id_id INT NOT NULL, pick_up_location_id_id INT NOT NULL, drop_off_location_id_id INT NOT NULL, start_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, end_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, remarks VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1619C27DB171EB6C ON rental (customer_id_id)');
        $this->addSql('CREATE INDEX IDX_1619C27DA0EF1B80 ON rental (car_id_id)');
        $this->addSql('CREATE INDEX IDX_1619C27DF447884F ON rental (pick_up_location_id_id)');
        $this->addSql('CREATE INDEX IDX_1619C27DE089B22E ON rental (drop_off_location_id_id)');
        $this->addSql('CREATE TABLE reservation (id INT NOT NULL, pick_up_location_id_id INT NOT NULL, drop_off_location_id_id INT NOT NULL, category_id_id INT NOT NULL, customer_id_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_42C84955F447884F ON reservation (pick_up_location_id_id)');
        $this->addSql('CREATE INDEX IDX_42C84955E089B22E ON reservation (drop_off_location_id_id)');
        $this->addSql('CREATE INDEX IDX_42C849559777D11E ON reservation (category_id_id)');
        $this->addSql('CREATE INDEX IDX_42C84955B171EB6C ON reservation (customer_id_id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D9777D11E FOREIGN KEY (category_id_id) REFERENCES car_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE rental ADD CONSTRAINT FK_1619C27DB171EB6C FOREIGN KEY (customer_id_id) REFERENCES customer (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE rental ADD CONSTRAINT FK_1619C27DA0EF1B80 FOREIGN KEY (car_id_id) REFERENCES car (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE rental ADD CONSTRAINT FK_1619C27DF447884F FOREIGN KEY (pick_up_location_id_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE rental ADD CONSTRAINT FK_1619C27DE089B22E FOREIGN KEY (drop_off_location_id_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955F447884F FOREIGN KEY (pick_up_location_id_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955E089B22E FOREIGN KEY (drop_off_location_id_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849559777D11E FOREIGN KEY (category_id_id) REFERENCES car_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955B171EB6C FOREIGN KEY (customer_id_id) REFERENCES customer (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE rental DROP CONSTRAINT FK_1619C27DA0EF1B80');
        $this->addSql('ALTER TABLE car DROP CONSTRAINT FK_773DE69D9777D11E');
        $this->addSql('ALTER TABLE reservation DROP CONSTRAINT FK_42C849559777D11E');
        $this->addSql('ALTER TABLE rental DROP CONSTRAINT FK_1619C27DB171EB6C');
        $this->addSql('ALTER TABLE reservation DROP CONSTRAINT FK_42C84955B171EB6C');
        $this->addSql('ALTER TABLE rental DROP CONSTRAINT FK_1619C27DF447884F');
        $this->addSql('ALTER TABLE rental DROP CONSTRAINT FK_1619C27DE089B22E');
        $this->addSql('ALTER TABLE reservation DROP CONSTRAINT FK_42C84955F447884F');
        $this->addSql('ALTER TABLE reservation DROP CONSTRAINT FK_42C84955E089B22E');
        $this->addSql('DROP SEQUENCE car_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE car_category_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE customer_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE location_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE rental_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE reservation_id_seq CASCADE');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE car_category');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE rental');
        $this->addSql('DROP TABLE reservation');
    }
}
