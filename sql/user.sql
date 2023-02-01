#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        id              Int NOT NULL ,
        email           Varchar (250) NOT NULL ,
        password        Varchar (250) NOT NULL ,
        subscribe       Bool NOT NULL ,
        number_password Int NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (id)
)ENGINE=InnoDB;

