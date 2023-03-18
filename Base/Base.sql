create database Ecriture;
create role comptable login password 'jeu';
alter database Ecriture owner to comptable ;

psql -U comptable ecriture

create sequence s_cara;
create table Caractere(
    idCaractere varchar(100) not null,
    Nombre integer not null,
    Primary key(idCaractere)
);

create sequence s_comp;
create table Compte(
    idCompte varchar(100) not null,
    Numero varchar(13) not null,
    Intitule varchar(100) not null,
    Primary key(idCompte)
);

insert into Compte values ('cpt'|| nextval('s_comp'),'10100','CAPITAL'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'10610','RESERVE LEGALE'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'11000','REPORT A NOUVEAU'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'12800','RESULTAT EN INSTANCE'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'16110','EMPRUNT A LT'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'16510','ENMPRUNT A MOYEN TERME');
insert into Compte values ('cpt'|| nextval('s_comp'),'20124','FRAIS DE REHABILITATION'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'20800','AUTRES IMMOB INCORPORELLES'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'21100','TERRAINS'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'21200','CONSTRUCTION'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'21300','MATERIEL ET OUTILLAGE'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'21510','MATERIEL AUTOMOBILE'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'21810','MATERIELS ET MOBILIERS DE BUREAU'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'21880','AUTRES IMMOBILISATIONS CORP'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'23000','IMMOBILISATION EN COURS'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'28000','AMORT IMMOB INCORP'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'28120','AMORTISSEMENT DES CONSTRUCTIONS'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'28130','AMORT MACH-MATER-OUTIL'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'28150','AMORT MAT DE TRANSPORT'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'28181','AMORT MATERIEL&MOB'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'32110','STOCK MATIERES PREMIERES'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'35500','STOCK PRODUITS FINIS'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'37000','STOCK MARCHANDISES'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'39700','PROVISIONS/DEPRECIATIONS STOCKS'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'40110','FOURNISSEURS DEXPLOITATIONS LOCAUX'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'40110','FOURNISSEURS DEXPLOITATIONS LOCAUX'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'40110','FOURNISSEURS DEXPLOITATIONS LOCAUX'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'40110','FOURNISSEURS DEXPLOITATIONS LOCAUX'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'40810','FRNS: FACTURE A RECEVOIR'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'40980','FRNS: RABAIS A OBTENIR'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'41110','CLIENTS LOCAUX'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'41110','CLIENTS LOCAUX'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'41110','CLIENTS LOCAUX');
insert into Compte values ('cpt'|| nextval('s_comp'),'41120','CLIENTS ETRANGERS'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'41400','CLIENTS DOUTEUX'); 
insert into Compte values ('cpt'|| nextval('s_comp'),'41800','CLIENTS FACTURE A RETABLIR');
insert into Compte values ('cpt'|| nextval('s_comp'),'42100','PERSONNEL: SALAIRES A PAYER');
insert into Compte values ('cpt'|| nextval('s_comp'),'43100','CNAPS');
insert into Compte values ('cpt'|| nextval('s_comp'),'43120','OSTIE');
insert into Compte values ('cpt'|| nextval('s_comp'),'44200','ETAT IBS');
insert into Compte values ('cpt'|| nextval('s_comp'),'44560','ETAT: TVA DEDUCTIBLE');
insert into Compte values ('cpt'|| nextval('s_comp'),'44571','TVA A VERSER');
insert into Compte values ('cpt'|| nextval('s_comp'),'46700','DEB/CRED DIVERS');
insert into Compte values ('cpt'|| nextval('s_comp'),'49100','PERTE/CLIENTS');
insert into Compte values ('cpt'|| nextval('s_comp'),'51200','BOA ANKORONDRANO');
insert into Compte values ('cpt'|| nextval('s_comp'),'51202','BNI MADAGASCAR');
insert into Compte values ('cpt'|| nextval('s_comp'),'53100','CAISSE');


create sequence s_ex; 


create table Exercice(
    idExercice varchar(100) not null,
    NomExercice varchar(100) not null,
    Debut date, 
    Fin date,
    Primary key(idExercice)
);


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
    Nom varchar(100) not null,
    Primary key(idCodeJournale)
);
INSERT INTO CodeJournale values ('cd'||NEXTVAL('s_code'),'charge');
INSERT INTO CodeJournale values ('cd'||NEXTVAL('s_code'),'vente');
INSERT INTO CodeJournale values ('cd'||NEXTVAL('s_code'),'tresorie');
INSERT INTO CodeJournale values ('cd'||NEXTVAL('s_code'),'A nouveau');




create sequence s_ecr;
create table Ecriture(
    idEcriture varchar(100) not null,
    idExercice varchar(100) not null,
    idCodeJournale varchar(100) not null,
    Date date,
    Libelle varchar(100) not null,
    Ref_Piece varchar(50) not null,
    Primary key(idEcriture),
    foreign key(idExercice) references Exercice(idExercice),
    foreign key(idCodeJournale) references CodeJournale(idCodeJournale)
);




--------------
 create or replace view vEcriture as select idEcriture,idExercice,idCodeJournale,Date,Libelle,Ref_Piece,date_part('day',date) as jour,
 date_part('month',date) as mois from Ecriture;
--------------
create sequence s_tier;
create table Tiers(
    idTiers varchar(100) not null,
    nomTiers varchar(100) not null,
    Primary key (idTiers)
);



create sequence s_mvt;
create table Mouvement(
    idMouvement varchar(100) not null,
    idEcriture varchar(100) not null,
    idCompte varchar(100) not null,
    idTiers varchar(100) ,
    Credit Numeric(20,2),
    Debit Numeric(20,2),
    Primary key(idMouvement),
    foreign key(idEcriture) references Ecriture(idEcriture),
    foreign key(idCompte) references Compte(idCompte),
    foreign key(idTiers) references Tiers(idTiers)
);



create or replace view vMouvement as select  Mouvement.idMouvement,
Mouvement.idEcriture,Mouvement.idCompte,Compte.Numero,Mouvement.idtiers,getTiers(Mouvement.idtiers) as tiers,
Mouvement.Credit,Mouvement.Debit ,substring(numero from 1 for 3) as numCompte from Mouvement join compte on Mouvement.idCompte=Compte.idCompte ;
create sequence s_dev;
create table Devise(
    idDevise varchar(100) not null,
    NomDevise varchar(100) not null,
    Primary key(idDevise)
);
INSERT INTO Devise values('dev_'||NEXTVAL('s_dev'),'dollar');
INSERT INTO Devise values('dev_'||NEXTVAL('s_dev'),'Euro');
INSERT INTO Devise values('dev_'||NEXTVAL('s_dev'),'Ariary');

create sequence s_histo;
create table HistoriqueDevise(
    idHisto varchar(100) not null,
    idMouvement varchar(100) not null,
    idDevise varchar(100) not null,
    dates date not null,
    Prix Numeric(20,4),
    Primary key(idHisto),
    foreign key(idMouvement) references Mouvement(idMouvement),
    foreign key(idDevise) references Devise(idDevise)
);

-------------GRAND LIVRE-------------------------------
CREATE OR REPLACE VIEW grandLivre as Select ecriture.date , ecriture.libelle ,vMouvement.tiers,
vMouvement.debit,vMouvement.credit,vMouvement.numCompte ,
vMouvement.idTiers,ecriture.idExercice
from vMouvement join ecriture on
ecriture.idEcriture = vMouvement.idEcriture order by ecriture.date asc;

-----------BALANCE-----------------------------
CREATE OR REPLACE view vBalance as SELECT numero as compte,intitule,SUM(debit) as mvtDebit,
SUM(credit) as mvtCredit,date,idExercice,getSoledDebit(SUM(credit),SUM(debit)) as soldeD,
getSoledCredit(SUM(credit),SUM(debit)) as soldeC,COUNT(numero) as nombre
 from balance group by(numero,intitule,date,idExercice) order by numero asc;

-----------------------------------------------------
create or replace view  compteMouv as select
Mouvement.idEcriture,Mouvement.idCompte,Compte.Numero,Compte.Intitule,
Mouvement.Credit,Mouvement.Debit from Mouvement join compte on Mouvement.idCompte=Compte.idCompte ;

create or replace view balance as select ecriture.idEcriture,ecriture.idExercice,
compteMouv.idCompte,compteMouv.Numero,compteMouv.Intitule,compteMouv.Credit,compteMouv.Debit,ecriture.date
from compteMouv join ecriture on ecriture.idEcriture = compteMouv.idEcriture;

----->>>--
SELECT compte,intitule,SUM(debit) as mvtD,
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
drop view vMouvement;
drop sequence s_mvt;
drop table tiers
drop table HistoriqueDevise;
drop table Mouvement;
drop view vEcriture;
drop sequence s_ecr;
drop table Ecriture;
drop sequence s_ex;
drop table Exercice;