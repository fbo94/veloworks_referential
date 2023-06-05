<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230605220221 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE bicycle_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE bicycles_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE bike_types_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE brand_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE color_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE component_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE component_families_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE country_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE discipline_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE material_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE size_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE bicycle (id INT NOT NULL, size_id INT DEFAULT NULL, bike_type_id INT DEFAULT NULL, model VARCHAR(100) NOT NULL, year INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D81AFAAE498DA827 ON bicycle (size_id)');
        $this->addSql('CREATE INDEX IDX_D81AFAAE7FF015AE ON bicycle (bike_type_id)');
        $this->addSql('CREATE TABLE bicycle_brand (bicycle_id INT NOT NULL, brand_id INT NOT NULL, PRIMARY KEY(bicycle_id, brand_id))');
        $this->addSql('CREATE INDEX IDX_BC6FED5A69645CF ON bicycle_brand (bicycle_id)');
        $this->addSql('CREATE INDEX IDX_BC6FED544F5D008 ON bicycle_brand (brand_id)');
        $this->addSql('CREATE TABLE bicycle_color (bicycle_id INT NOT NULL, color_id INT NOT NULL, PRIMARY KEY(bicycle_id, color_id))');
        $this->addSql('CREATE INDEX IDX_71C24F64A69645CF ON bicycle_color (bicycle_id)');
        $this->addSql('CREATE INDEX IDX_71C24F647ADA1FB5 ON bicycle_color (color_id)');
        $this->addSql('CREATE TABLE bicycle_material (bicycle_id INT NOT NULL, material_id INT NOT NULL, PRIMARY KEY(bicycle_id, material_id))');
        $this->addSql('CREATE INDEX IDX_2D703CCBA69645CF ON bicycle_material (bicycle_id)');
        $this->addSql('CREATE INDEX IDX_2D703CCBE308AC6F ON bicycle_material (material_id)');
        $this->addSql('CREATE TABLE bicycle_component (bicycle_id INT NOT NULL, component_id INT NOT NULL, PRIMARY KEY(bicycle_id, component_id))');
        $this->addSql('CREATE INDEX IDX_C57C13EDA69645CF ON bicycle_component (bicycle_id)');
        $this->addSql('CREATE INDEX IDX_C57C13EDE2ABAFFF ON bicycle_component (component_id)');
        $this->addSql('CREATE TABLE bicycles (id INT NOT NULL, component_family_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, code VARCHAR(10) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2AB85B1E1DA7CA3B ON bicycles (component_family_id)');
        $this->addSql('CREATE TABLE bike_types (id INT NOT NULL, disciplines_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F09D906490D3DF94 ON bike_types (disciplines_id)');
        $this->addSql('CREATE TABLE brand (id INT NOT NULL, country_id INT DEFAULT NULL, label VARCHAR(100) NOT NULL, code VARCHAR(20) NOT NULL, created_year INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1C52F958F92F3E70 ON brand (country_id)');
        $this->addSql('CREATE TABLE color (id INT NOT NULL, label VARCHAR(100) NOT NULL, code VARCHAR(10) NOT NULL, dominante VARCHAR(100) NOT NULL, panetone_code VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE component (id INT NOT NULL, type_id INT DEFAULT NULL, brand_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, description TEXT NOT NULL, indicative_weight DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_49FEA157C54C8C93 ON component (type_id)');
        $this->addSql('CREATE INDEX IDX_49FEA15744F5D008 ON component (brand_id)');
        $this->addSql('CREATE TABLE component_material (material_id INT NOT NULL, PRIMARY KEY(material_id))');
        $this->addSql('CREATE TABLE component_families (id INT NOT NULL, name VARCHAR(100) NOT NULL, code VARCHAR(10) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE country (id INT NOT NULL, label VARCHAR(255) NOT NULL, code_alpha2 VARCHAR(2) NOT NULL, code_alpha3 VARCHAR(3) NOT NULL, code_numeric VARCHAR(3) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5373C966C8E48ED0 ON country (code_alpha2)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5373C966BFE3BE46 ON country (code_alpha3)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5373C9667F06D8D7 ON country (code_numeric)');
        $this->addSql('CREATE TABLE discipline (id INT NOT NULL, label VARCHAR(100) NOT NULL, code VARCHAR(10) NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE material (id INT NOT NULL, name VARCHAR(100) NOT NULL, symbol VARCHAR(3) NOT NULL, atomic_number INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE size (id INT NOT NULL, code VARCHAR(100) NOT NULL, label VARCHAR(100) NOT NULL, min_size_cm INT NOT NULL, max_size_cm INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE bicycle ADD CONSTRAINT FK_D81AFAAE498DA827 FOREIGN KEY (size_id) REFERENCES size (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE bicycle ADD CONSTRAINT FK_D81AFAAE7FF015AE FOREIGN KEY (bike_type_id) REFERENCES bike_types (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE bicycle_brand ADD CONSTRAINT FK_BC6FED5A69645CF FOREIGN KEY (bicycle_id) REFERENCES bicycle (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE bicycle_brand ADD CONSTRAINT FK_BC6FED544F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE bicycle_color ADD CONSTRAINT FK_71C24F64A69645CF FOREIGN KEY (bicycle_id) REFERENCES bicycle (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE bicycle_color ADD CONSTRAINT FK_71C24F647ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE bicycle_material ADD CONSTRAINT FK_2D703CCBA69645CF FOREIGN KEY (bicycle_id) REFERENCES bicycle (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE bicycle_material ADD CONSTRAINT FK_2D703CCBE308AC6F FOREIGN KEY (material_id) REFERENCES material (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE bicycle_component ADD CONSTRAINT FK_C57C13EDA69645CF FOREIGN KEY (bicycle_id) REFERENCES bicycle (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE bicycle_component ADD CONSTRAINT FK_C57C13EDE2ABAFFF FOREIGN KEY (component_id) REFERENCES component (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE bicycles ADD CONSTRAINT FK_2AB85B1E1DA7CA3B FOREIGN KEY (component_family_id) REFERENCES component_families (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE bike_types ADD CONSTRAINT FK_F09D906490D3DF94 FOREIGN KEY (disciplines_id) REFERENCES discipline (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE brand ADD CONSTRAINT FK_1C52F958F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE component ADD CONSTRAINT FK_49FEA157C54C8C93 FOREIGN KEY (type_id) REFERENCES bicycles (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE component ADD CONSTRAINT FK_49FEA15744F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SCHEMA app');
        $this->addSql('DROP SEQUENCE bicycle_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE bicycles_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE bike_types_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE brand_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE color_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE component_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE component_families_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE country_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE discipline_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE material_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE size_id_seq CASCADE');
        $this->addSql('ALTER TABLE bicycle DROP CONSTRAINT FK_D81AFAAE498DA827');
        $this->addSql('ALTER TABLE bicycle DROP CONSTRAINT FK_D81AFAAE7FF015AE');
        $this->addSql('ALTER TABLE bicycle_brand DROP CONSTRAINT FK_BC6FED5A69645CF');
        $this->addSql('ALTER TABLE bicycle_brand DROP CONSTRAINT FK_BC6FED544F5D008');
        $this->addSql('ALTER TABLE bicycle_color DROP CONSTRAINT FK_71C24F64A69645CF');
        $this->addSql('ALTER TABLE bicycle_color DROP CONSTRAINT FK_71C24F647ADA1FB5');
        $this->addSql('ALTER TABLE bicycle_material DROP CONSTRAINT FK_2D703CCBA69645CF');
        $this->addSql('ALTER TABLE bicycle_material DROP CONSTRAINT FK_2D703CCBE308AC6F');
        $this->addSql('ALTER TABLE bicycle_component DROP CONSTRAINT FK_C57C13EDA69645CF');
        $this->addSql('ALTER TABLE bicycle_component DROP CONSTRAINT FK_C57C13EDE2ABAFFF');
        $this->addSql('ALTER TABLE bicycles DROP CONSTRAINT FK_2AB85B1E1DA7CA3B');
        $this->addSql('ALTER TABLE bike_types DROP CONSTRAINT FK_F09D906490D3DF94');
        $this->addSql('ALTER TABLE brand DROP CONSTRAINT FK_1C52F958F92F3E70');
        $this->addSql('ALTER TABLE component DROP CONSTRAINT FK_49FEA157C54C8C93');
        $this->addSql('ALTER TABLE component DROP CONSTRAINT FK_49FEA15744F5D008');
        $this->addSql('DROP TABLE bicycle');
        $this->addSql('DROP TABLE bicycle_brand');
        $this->addSql('DROP TABLE bicycle_color');
        $this->addSql('DROP TABLE bicycle_material');
        $this->addSql('DROP TABLE bicycle_component');
        $this->addSql('DROP TABLE bicycles');
        $this->addSql('DROP TABLE bike_types');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP TABLE component');
        $this->addSql('DROP TABLE component_material');
        $this->addSql('DROP TABLE component_families');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE discipline');
        $this->addSql('DROP TABLE material');
        $this->addSql('DROP TABLE size');
    }
}
