create database Ecriture;
drop database Ecriture;

create sequence s_ent;
create table Entreprise(
    idEntreprise varchar(50) not null primary key ,
    nom varchar(100) not null ,
    mdp text not null ,
    dirigeant varchar(100) not null ,
    siege varchar(100) not null ,
    dateDeCreation date not null ,
    numidfiscale varchar(50) not null ,
    numstatistique varchar(50) not null ,
    numregcom varchar(50) not null ,
    status varchar(50) not null ,
    datedebutexercice date not null ,
    devtenuedecompte varchar(50) not null ,
    devequiv varchar(50) not null
);
insert into Entreprise values ('ent' || nextval('s_ent'), 'Kudeta','kudeta','Balita','Anosy','03-22-2001','2532','256223','53321','4652FRH','03-22-2010','451332','15613');
select * from Entreprise;

create sequence s_cara;
create table Caractere(
    idCaractere varchar(100) not null,
    Nombre integer not null,
    idEntreprise varchar(50) references Entreprise(idEntreprise) not null,
    Primary key(idCaractere)
);
drop sequence s_cara;
drop table Caractere;
insert into Caractere VALUES ('s_cara' || nextval('s_cara'), 5, 'ent1');

create sequence s_comp;
create table Compte(
    idCompte varchar(100) not null,
    Numero varchar(13) not null,
    Intitule varchar(100) not null,
    idEntreprise varchar(50) references Entreprise(idEntreprise) not null ,
    Primary key(idCompte,Numero)
);
drop table Compte cascade ;
select * from compte;

insert into Compte values ('cpt'|| nextval('s_comp'),'10100','CAPITAL','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'10610','RESERVE LEGALE','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'11000','REPORT A NOUVEAU','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'12800','RESULTAT EN INSTANCE','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'16110','EMPRUNT A LT','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'16510','ENMPRUNT A MOYEN TERME','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'20124','FRAIS DE REHABILITATION','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'20800','AUTRES IMMOB INCORPORELLES','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'21100','TERRAINS','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'21200','CONSTRUCTION','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'21300','MATERIEL ET OUTILLAGE','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'21510','MATERIEL AUTOMOBILE','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'21810','MATERIELS ET MOBILIERS DE BUREAU','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'21880','AUTRES IMMOBILISATIONS CORP','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'23000','IMMOBILISATION EN COURS','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'28000','AMORT IMMOB INCORP','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'28120','AMORTISSEMENT DES CONSTRUCTIONS','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'28130','AMORT MACH-MATER-OUTIL','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'28150','AMORT MAT DE TRANSPORT','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'28181','AMORT MATERIEL&MOB','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'32110','STOCK MATIERES PREMIERES','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'35500','STOCK PRODUITS FINIS','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'37000','STOCK MARCHANDISES','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'39700','PROVISIONS/DEPRECIATIONS STOCKS','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'40110','FOURNISSEURS DEXPLOITATIONS LOCAUX','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'40110','FOURNISSEURS DEXPLOITATIONS LOCAUX','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'40110','FOURNISSEURS DEXPLOITATIONS LOCAUX','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'40110','FOURNISSEURS DEXPLOITATIONS LOCAUX','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'40810','FRNS: FACTURE A RECEVOIR','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'40980','FRNS: RABAIS A OBTENIR','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'41110','CLIENTS LOCAUX','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'41110','CLIENTS LOCAUX','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'41110','CLIENTS LOCAUX','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'41120','CLIENTS ETRANGERS','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'41400','CLIENTS DOUTEUX','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'41800','CLIENTS FACTURE A RETABLIR','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'42100','PERSONNEL: SALAIRES A PAYER','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'43100','CNAPS','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'43120','OSTIE','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'44200','ETAT IBS','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'44560','ETAT: TVA DEDUCTIBLE','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'44571','TVA A VERSER','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'46700','DEB/CRED DIVERS','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'49100','PERTE/CLIENTS','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'51200','BOA ANKORONDRANO','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'51202','BNI MADAGASCAR','ent1');
insert into Compte values ('cpt'|| nextval('s_comp'),'53100','CAISSE','ent1');


create sequence s_ex;
create table Exercice(
    idExercice varchar(100) not null,
    NomExercice varchar(100) not null,
    Debut date,
    Fin date,
    idEntreprise varchar(50) references Entreprise(idEntreprise) not null ,
    Primary key(idExercice)
);
select * from Exercice;
select idExercice, NomExercice, extract('month' from Debut) as mois, extract('year' from Debut) as an, idEntreprise from Exercice;

SELECT numCompte,idtiers from grandLivre where idExercice = 's_ex10' group by numCompte,idtiers order by numcompte asc;

create sequence s_num;
create table NumeroCompte(
    idNumeroCompte varchar(100) not null,
    Numero integer,
    Nom varchar(100) not null,
    Primary key(idNumeroCompte)
);
  INSERT INTO NumeroCompte VALUES('n_'||NEXTVAL('s_num'),1,'Capitaux');
  INSERT INTO NumeroCompte VALUES('n_'||NEXTVAL('s_num'),2,'Immobilisation');
  INSERT INTO NumeroCompte VALUES('n_'||NEXTVAL('s_num'),3,'Stock');
  INSERT INTO NumeroCompte VALUES('n_'||NEXTVAL('s_num'),4,'Compte de tiers');
  INSERT INTO NumeroCompte VALUES('n_'||NEXTVAL('s_num'),5,'Compte de Tresorerie');
  INSERT INTO NumeroCompte VALUES('n_'||NEXTVAL('s_num'),6,'Charge');
  INSERT INTO NumeroCompte VALUES('n_'||NEXTVAL('s_num'),7,'Produit');

create sequence s_code;
create table CodeJournale(
    idCodeJournale varchar(100) not null,
    code varchar(10) not null ,
    Nom varchar(100) not null,
    Primary key(idCodeJournale)
);
drop table CodeJournale cascade ;
INSERT INTO CodeJournale values ('cd'||NEXTVAL('s_code'),'CH','charge');
INSERT INTO CodeJournale values ('cd'||NEXTVAL('s_code'),'VL','vente local');
INSERT INTO CodeJournale values ('cd'||NEXTVAL('s_code'),'VE','vente export');
INSERT INTO CodeJournale values ('cd'||NEXTVAL('s_code'),'CA','caisse');
INSERT INTO CodeJournale values ('cd'||NEXTVAL('s_code'),'BN','banque');
INSERT INTO CodeJournale values ('cd'||NEXTVAL('s_code'),'OD','operation diverses');
INSERT INTO CodeJournale values ('cd'||NEXTVAL('s_code'),'AN','A nouveau');



create sequence s_ecr;
create table Ecriture(
    idEcriture varchar(100) not null,
    idExercice varchar(100) not null,
    idCodeJournale varchar(100) not null,
    Date date,
    Libelle varchar(100) not null,
    Ref_Piece varchar(20) not null,
    idEntreprise varchar(50) references Entreprise(idEntreprise) not null ,
    Primary key(idEcriture),
    foreign key(idExercice) references Exercice(idExercice),
    foreign key(idCodeJournale) references CodeJournale(idCodeJournale)
);
select * from ecriture;
select * from mouvement;
select * from compte;
drop sequence s_ecr;
drop table ecriture cascade ;

select * from Mouvement join Ecriture E on Mouvement.idEcriture = E.idEcriture;

DELETE from Mouvement using Ecriture E
where Mouvement.idEcriture = E.idEcriture
and E.idExercice = 's_ex6' and E.idEntreprise = 'ent1';

DELETE FROM Mouvement
USING Ecriture E
WHERE Mouvement.idEcriture = E.idEcriture
  AND E.idecriture = 's_ecr4';


--------------
 create or replace view vEcriture as select idEcriture,idExercice,idCodeJournale,Date,Libelle,Ref_Piece,date_part('day',date) as jour,
 date_part('month',date) as mois from Ecriture;
--------------
create sequence s_tier;
ALTER TABLE Tiers ADD CONSTRAINT uc_idtiers UNIQUE (idTiers);
ALTER TABLE Tiers ADD CONSTRAINT uc_intitule UNIQUE (intitulecompte);
create table Tiers(
    idTiers varchar(100) not null,
    type varchar(10) not null ,
    nomTiers varchar(100) not null,
    intitulecompte varchar(100) not null ,
    idEntreprise varchar(50) references Entreprise(idEntreprise) not null ,
    Primary key (idTiers,intitulecompte)
);
select * from tiers;
drop table tiers cascade ;


create sequence s_typetiers;
create table typetiers(
    idTypeTiers varchar(100) primary key not null ,
    type varchar(100),
    name varchar(100)
);
insert into typetiers values ('trs' || NEXTVAL('s_typetiers'),'Fo','Fournisseur');
insert into typetiers values ('trs' || NEXTVAL('s_typetiers'),'Cl','Client');

create sequence s_mvt;
ALTER TABLE Compte ADD CONSTRAINT uc_idCompte UNIQUE (idCompte);
ALTER TABLE Compte ADD CONSTRAINT uc_idnumero UNIQUE (numero);
create table Mouvement(
    idMouvement varchar(100) not null,
    idEcriture varchar(100) not null,
    idCompte varchar(100) not null,
    idTiers varchar(100) ,
    Credit Numeric(20,2),
    Debit Numeric(20,2),
    idEntreprise varchar(50) references Entreprise(idEntreprise) not null ,
    Primary key(idMouvement),
    foreign key(idEcriture) references Ecriture(idEcriture),
    foreign key(idCompte) references Compte(Numero),
    foreign key(idTiers) references Tiers(intitulecompte)
);
drop table mouvement cascade ;
INSERT INTO Mouvement VALUES ('s_mvt'||NEXTVAL('s_mvt'),'s_ecr10','10100',null,'1400000','0.0','ent1');
INSERT INTO Mouvement VALUES ('s_mvt'||NEXTVAL('s_mvt'),'s_ecr2','40110','s_tier1','865400','0.0','ent1');


select * from mouvement;
select * from compte;
select * from tiers;
drop table mouvement cascade ;


create sequence s_dev;
create table Devise(
    idDevise varchar(100) not null,
    NomDevise varchar(100) not null,
    Primary key(idDevise)
);
INSERT INTO Devise values('dev_'||NEXTVAL('s_dev'),'Dollar');
INSERT INTO Devise values('dev_'||NEXTVAL('s_dev'),'Euro');
INSERT INTO Devise values('dev_'||NEXTVAL('s_dev'),'Ariary');

create sequence s_histo;
create table HistoriqueDevise(
    idHisto varchar(100) not null,
    idMouvement varchar(100) not null,
    idDevise varchar(100) not null,
    dates date not null,
    Prix Numeric(20,4),
    idEntreprise varchar(50) references Entreprise(idEntreprise) not null ,
    Primary key(idHisto),
    foreign key(idMouvement) references Mouvement(idMouvement),
    foreign key(idDevise) references Devise(idDevise)
);

-----------------------------------------------------
create or replace view  compteMouv as select
Mouvement.idEcriture,Mouvement.idCompte,Compte.Numero,Compte.Intitule,
Mouvement.Credit,Mouvement.Debit from Mouvement join compte on Mouvement.idCompte=Compte.Numero ;

create or replace view balance as select ecriture.idEcriture,ecriture.idExercice,
compteMouv.idCompte,compteMouv.Numero,compteMouv.Intitule,compteMouv.Credit,compteMouv.Debit,ecriture.date
from compteMouv join ecriture on ecriture.idEcriture = compteMouv.idEcriture;

----->>>--
-----------------------------------------------------------------------------------------------------------------------
    Create or replace function getTiers(idTier varchar(100))
    returns varchar(100)
    language plpgsql
    as
    $$
    Declare
     nom varchar(100) := '' ;
    Begin
       select nomTiers
       into nom
       from Tiers
       where idTiers=idTier;

       return nom;
    End;
    $$;

    create or replace function getNumeroCompte(compte varchar(13))
    returns varchar(13)
    language plpgsql
    as
    $$
    Declare
        num varchar(13) := '';
    Begin

         return num;
    End;
    $$;

    create or replace function getSoledDebit(credit numeric(20,2),debit numeric(20,2))
    returns numeric(20,2)
    language plpgsql
    as
    $$
    Declare
        solde numeric(20,2) := 0.0;
    Begin
        if credit < debit then
            solde := debit - credit;
        End if;
        return solde;
    End;
    $$;

    create or replace function getSoledCredit(credit numeric(20,2),debit numeric(20,2))
    returns numeric(20,2)
    language plpgsql
    as
    $$
    Declare
        solde numeric(20,2) := 0.0;
    Begin
        if credit > debit then
            solde := credit - debit;
        End if;
        return solde;
    End;
    $$;
-------------------------------------------------------------------------------------
create or replace view vMouvement as select  Mouvement.idMouvement,
Mouvement.idEcriture,Mouvement.idCompte,Compte.Numero,Mouvement.idtiers,getTiers(Mouvement.idtiers) as tiers,
Mouvement.Credit,Mouvement.Debit ,substring(numero from 1 for 3) as numCompte from Mouvement join compte on Mouvement.idCompte=Compte.Numero ;
---------------------------------------------------------------------------------------
create or replace view vMouvementEtatFinancier as select  Mouvement.idMouvement,
Mouvement.idEcriture,Mouvement.idCompte,Compte.Numero,Mouvement.idtiers,getTiers(Mouvement.idtiers) as tiers,
Mouvement.Credit,Mouvement.Debit ,substring(numero from 1 for 5) as numCompte from Mouvement join compte on Mouvement.idCompte=Compte.Numero ;
-------------GRAND LIVRE-------------------------------
CREATE OR REPLACE VIEW grandLivre as Select ecriture.date , ecriture.libelle ,vMouvement.tiers,
vMouvement.debit,vMouvement.credit,vMouvement.numCompte ,
vMouvement.idTiers,ecriture.idExercice
from vMouvement join ecriture on
ecriture.idEcriture = vMouvement.idEcriture order by ecriture.date asc;
--------------------------------------------------------
CREATE OR REPLACE VIEW grandLivreEtatFinancier as Select ecriture.date , ecriture.libelle ,vMouvementEtatFinancier.tiers,
vMouvementEtatFinancier.debit,vMouvementEtatFinancier.credit,vMouvementEtatFinancier.numCompte ,
vMouvementEtatFinancier.idTiers,ecriture.idExercice
from vMouvementEtatFinancier join ecriture on
ecriture.idEcriture = vMouvementEtatFinancier.idEcriture order by ecriture.date asc;
-----------BALANCE-----------------------------
CREATE OR REPLACE view vBalance as SELECT numero as compte,intitule,SUM(debit) as mvtDebit,
SUM(credit) as mvtCredit,date,idExercice,getSoledDebit(SUM(credit),SUM(debit)) as soldeD,
getSoledCredit(SUM(credit),SUM(debit)) as soldeC,COUNT(numero) as nombre
 from balance group by(numero,intitule,date,idExercice) order by numero asc;

SELECT * FROM Compte  where idEntreprise = 'ent1' and Numero::text != '0' order by numero ;


drop view vMouvement;
drop sequence s_mvt;
drop table tiers;
drop table HistoriqueDevise;
drop table Mouvement;
drop view vEcriture;
drop sequence s_ecr;
drop table Ecriture;
drop sequence s_ex;
drop table Exercice;

select * from exercice;
select * from grandLivre;
select * from mouvement;
SELECT numCompte,idtiers from grandLivre where idExercice = 's_ex1' group by numCompte,idtiers order by numcompte asc
SELECT numCompte,idtiers,debit from grandLivreEtatFinancier where idExercice = 's_ex1' group by numCompte,idtiers,debit order by numcompte asc
SELECT numCompte,idtiers,debit from grandLivreEtatFinancier where idExercice = 's_ex1' and numCompte like '3%' and numCompte not like '31%' group by numCompte,idtiers,debit order by numcompte asc

select * from entreprise;
