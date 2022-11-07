<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200628002340 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE administrateur (id INT AUTO_INCREMENT NOT NULL, img VARCHAR(255) NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, cin VARCHAR(8) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, username VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, iset_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, nbr_etudiant INT NOT NULL, INDEX IDX_8F87BF96227B7AF3 (iset_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, sujet VARCHAR(255) DEFAULT NULL, contenu VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE deposer (id INT AUTO_INCREMENT NOT NULL, etudiant_id INT DEFAULT NULL, support_id INT DEFAULT NULL, date DATETIME NOT NULL, travail VARCHAR(255) NOT NULL, filename VARCHAR(255) NOT NULL, note NUMERIC(5, 2) NOT NULL, INDEX IDX_D00D7700DDEAB1A3 (etudiant_id), INDEX IDX_D00D7700315B405 (support_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ens_classe (id INT AUTO_INCREMENT NOT NULL, enseignant_id INT DEFAULT NULL, classe_id INT DEFAULT NULL, INDEX IDX_89E2EC6CE455FCC0 (enseignant_id), INDEX IDX_89E2EC6C8F5EA509 (classe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enseignant (id INT AUTO_INCREMENT NOT NULL, iset_id INT DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, cin VARCHAR(8) NOT NULL, img VARCHAR(255) NOT NULL, password VARCHAR(255) DEFAULT NULL, username VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_81A72FA1227B7AF3 (iset_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ens_matiere (id INT AUTO_INCREMENT NOT NULL, enseignant_id INT DEFAULT NULL, matiere_id INT DEFAULT NULL, INDEX IDX_CD7A291BE455FCC0 (enseignant_id), INDEX IDX_CD7A291BF46CD258 (matiere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, classe_id INT DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, cin VARCHAR(255) NOT NULL, img VARCHAR(255) NOT NULL, date_naissance DATE DEFAULT NULL, username VARCHAR(255) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_717E22E38F5EA509 (classe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iset (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE librairie (id INT AUTO_INCREMENT NOT NULL, enseignant_id INT DEFAULT NULL, support VARCHAR(255) NOT NULL, categorie VARCHAR(255) NOT NULL, date_ajout DATE NOT NULL, INDEX IDX_F5D733FBE455FCC0 (enseignant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matiere (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, topic VARCHAR(255) NOT NULL, contenu VARCHAR(255) NOT NULL, date_post DATETIME NOT NULL, INDEX IDX_5A8A6C8DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reponse (id INT AUTO_INCREMENT NOT NULL, post_id INT DEFAULT NULL, user_id INT DEFAULT NULL, reponse VARCHAR(255) NOT NULL, date_reponse DATETIME NOT NULL, INDEX IDX_5FB6DEC74B89032C (post_id), INDEX IDX_5FB6DEC7A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE support (id INT AUTO_INCREMENT NOT NULL, matiere_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, contenu VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, date_ajout DATETIME NOT NULL, espace_depot VARCHAR(4) NOT NULL, INDEX IDX_8004EBA5F46CD258 (matiere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, type VARCHAR(1) DEFAULT NULL, img VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, cin VARCHAR(8) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE classe ADD CONSTRAINT FK_8F87BF96227B7AF3 FOREIGN KEY (iset_id) REFERENCES iset (id)');
        $this->addSql('ALTER TABLE deposer ADD CONSTRAINT FK_D00D7700DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE deposer ADD CONSTRAINT FK_D00D7700315B405 FOREIGN KEY (support_id) REFERENCES support (id)');
        $this->addSql('ALTER TABLE ens_classe ADD CONSTRAINT FK_89E2EC6CE455FCC0 FOREIGN KEY (enseignant_id) REFERENCES enseignant (id)');
        $this->addSql('ALTER TABLE ens_classe ADD CONSTRAINT FK_89E2EC6C8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE enseignant ADD CONSTRAINT FK_81A72FA1227B7AF3 FOREIGN KEY (iset_id) REFERENCES iset (id)');
        $this->addSql('ALTER TABLE ens_matiere ADD CONSTRAINT FK_CD7A291BE455FCC0 FOREIGN KEY (enseignant_id) REFERENCES enseignant (id)');
        $this->addSql('ALTER TABLE ens_matiere ADD CONSTRAINT FK_CD7A291BF46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E38F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE librairie ADD CONSTRAINT FK_F5D733FBE455FCC0 FOREIGN KEY (enseignant_id) REFERENCES enseignant (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DA76ED395 FOREIGN KEY (user_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC74B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC7A76ED395 FOREIGN KEY (user_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE support ADD CONSTRAINT FK_8004EBA5F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ens_classe DROP FOREIGN KEY FK_89E2EC6C8F5EA509');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E38F5EA509');
        $this->addSql('ALTER TABLE ens_classe DROP FOREIGN KEY FK_89E2EC6CE455FCC0');
        $this->addSql('ALTER TABLE ens_matiere DROP FOREIGN KEY FK_CD7A291BE455FCC0');
        $this->addSql('ALTER TABLE librairie DROP FOREIGN KEY FK_F5D733FBE455FCC0');
        $this->addSql('ALTER TABLE deposer DROP FOREIGN KEY FK_D00D7700DDEAB1A3');
        $this->addSql('ALTER TABLE classe DROP FOREIGN KEY FK_8F87BF96227B7AF3');
        $this->addSql('ALTER TABLE enseignant DROP FOREIGN KEY FK_81A72FA1227B7AF3');
        $this->addSql('ALTER TABLE ens_matiere DROP FOREIGN KEY FK_CD7A291BF46CD258');
        $this->addSql('ALTER TABLE support DROP FOREIGN KEY FK_8004EBA5F46CD258');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC74B89032C');
        $this->addSql('ALTER TABLE deposer DROP FOREIGN KEY FK_D00D7700315B405');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DA76ED395');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC7A76ED395');
        $this->addSql('DROP TABLE administrateur');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE deposer');
        $this->addSql('DROP TABLE ens_classe');
        $this->addSql('DROP TABLE enseignant');
        $this->addSql('DROP TABLE ens_matiere');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE iset');
        $this->addSql('DROP TABLE librairie');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE reponse');
        $this->addSql('DROP TABLE support');
        $this->addSql('DROP TABLE utilisateur');
    }
}
