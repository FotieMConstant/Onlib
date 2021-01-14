/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de cr�ation :  11 Sep 2019 14:06:13                     */
/*==============================================================*/


drop table if exists Admin;

drop table if exists Book;

drop table if exists Category;

drop table if exists NormalUser;

drop table if exists Payment;

drop table if exists PyaUser;

drop table if exists pay;

drop table if exists post;

drop table if exists subscribe;

/*==============================================================*/
/* Table : Admin                                                */
/*==============================================================*/
create table Admin
(
   id                   int not null AUTO_INCREMENT,
   fname                varchar(254),
   lname                varchar(254),
   email                varchar(254),
   password             varchar(254),
   primary key (id)
);

/*==============================================================*/
/* Table : Book                                                 */
/*==============================================================*/
create table Book
(
   id                   int not null AUTO_INCREMENT,
   Adm_id               int not null,
   catId                int not null,
   title                varchar(254),
   publisher            varchar(254),
   publishDate          datetime,
   postDate             datetime,
   edition              int,
   author               varchar(254),
   nubPages             int,
   book                 varchar(254),
   audioBook            varchar(254),
   coverPic             varchar(254),
   description          varchar(254),
   subscriptionPrice    int,
   pyaBook              bool,
   subscriptions        int,
   primary key (id)
);

/*==============================================================*/
/* Table : Category                                             */
/*==============================================================*/
create table Category
(
   catId                int not null AUTO_INCREMENT,
   id                   int not null,
   catName              varchar(254),
   primary key (catId)
);

/*==============================================================*/
/* Table : NormalUser                                           */
/*==============================================================*/
create table NormalUser
(
   id                   int not null AUTO_INCREMENT,
   fname                varchar(254),
   lname                varchar(254),
   password             varchar(254),
   email                varchar(254),
   phone                int,
   regDate              datetime,
   gender               varchar(254),
   picture              varchar(254),
   subBooks             varchar(254),
   primary key (id)
);

/*==============================================================*/
/* Table : Payment                                              */
/*==============================================================*/
create table Payment
(
   pId                  int not null AUTO_INCREMENT,
   paidDate             datetime,
   username             varchar(254),
   paid                 varchar(254),
   primary key (pId)
);

/*==============================================================*/
/* Table : PyaUser                                              */
/*==============================================================*/
create table PyaUser
(
   id                   int not null AUTO_INCREMENT,
   fname                varchar(254),
   lname                varchar(254),
   email                varchar(254),
   password             varchar(254),
   phone                int,
   regDate              datetime,
   gender               varchar(254),
   picture              varchar(254),
   primary key (id)
);

/*==============================================================*/
/* Table : pay                                                  */
/*==============================================================*/
create table pay
(
   pId                  int not null,
   id                   int not null,
   primary key (pId, id)
);

/*==============================================================*/
/* Table : post                                                 */
/*==============================================================*/
create table post
(
   Pya_id               int not null AUTO_INCREMENT,
   id                   int not null,
   primary key (Pya_id, id)
);

/*==============================================================*/
/* Table : subscribe                                            */
/*==============================================================*/
create table subscribe
(
   Nor_id               int not null,
   id                   int not null,
   primary key (Nor_id, id)
);

alter table Book add constraint FK_association2 foreign key (Adm_id)
      references Admin (id) on delete restrict on update restrict;

alter table Book add constraint FK_association3 foreign key (catId)
      references Category (catId) on delete restrict on update restrict;

alter table Category add constraint FK_association4 foreign key (id)
      references Admin (id) on delete restrict on update restrict;

alter table pay add constraint FK_pay foreign key (id)
      references Book (id) on delete restrict on update restrict;

alter table pay add constraint FK_pay foreign key (pId)
      references Payment (pId) on delete restrict on update restrict;

alter table post add constraint FK_post foreign key (id)
      references Book (id) on delete restrict on update restrict;

alter table post add constraint FK_post foreign key (Pya_id)
      references PyaUser (id) on delete restrict on update restrict;

alter table subscribe add constraint FK_subscribe foreign key (id)
      references Book (id) on delete restrict on update restrict;

alter table subscribe add constraint FK_subscribe foreign key (Nor_id)
      references NormalUser (id) on delete restrict on update restrict;

