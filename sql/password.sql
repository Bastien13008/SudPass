#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: password
#------------------------------------------------------------

CREATE TABLE password(
        id       Int NOT NULL ,
        user     Varchar (255) NOT NULL ,
        photo    Varchar (255) NOT NULL ,
        url      Varchar (255) NOT NULL ,
        email    Varchar (255) NOT NULL ,
        password Varchar (255) NOT NULL
	,CONSTRAINT password_PK PRIMARY KEY (id)
)ENGINE=InnoDB;

