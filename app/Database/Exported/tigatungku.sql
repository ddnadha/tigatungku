/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     08/06/2022 14:51:27                          */
/*==============================================================*/


-- alter table MENU_ITEM 
--    drop foreign key FK_MENU_ITE_MENU_ITEM_STOCK;

-- alter table MENU_ITEM 
--    drop foreign key FK_MENU_ITE_MENU_ITEM_MENU;

-- alter table ORDERS 
--    drop foreign key FK_ORDERS_USER_ORDE_USER;

-- alter table ORDER_ITEM 
--    drop foreign key FK_ORDER_IT_ORDER_ITE_ORDERS;

-- alter table ORDER_ITEM 
--    drop foreign key FK_ORDER_IT_ORDER_ITE_MENU;

-- drop table if exists MENU;


-- alter table MENU_ITEM 
--    drop foreign key FK_MENU_ITE_MENU_ITEM_STOCK;

-- alter table MENU_ITEM 
--    drop foreign key FK_MENU_ITE_MENU_ITEM_MENU;

-- drop table if exists MENU_ITEM;


-- alter table ORDERS 
--    drop foreign key FK_ORDERS_USER_ORDE_USER;

drop table if exists ORDERS;


-- alter table ORDER_ITEM 
--    drop foreign key FK_ORDER_IT_ORDER_ITE_ORDERS;

-- alter table ORDER_ITEM 
--    drop foreign key FK_ORDER_IT_ORDER_ITE_MENU;

drop table if exists ORDER_ITEM;

drop table if exists STOCK;

drop table if exists USER;

/*==============================================================*/
/* Table: MENU                                                  */
/*==============================================================*/
create table MENU
(
   MENU_ID              int not null  comment '',
   MENU_NAME            varchar(100) not null  comment '',
   DESCRIPTION          text not null  comment '',
   PRICE                int not null  comment '',
   MENU_IMG_URL         text not null  comment '',
   primary key (MENU_ID)
);

/*==============================================================*/
/* Table: MENU_ITEM                                             */
/*==============================================================*/
create table MENU_ITEM
(
   MENU_ITEM_ID         int not null  comment '',
   STOCK_ID             int not null  comment '',
   MENU_ID              int not null  comment '',
   UNIT_AMOUNT          varchar(100) not null  comment '',
   primary key (MENU_ITEM_ID)
);

/*==============================================================*/
/* Table: ORDERS                                                */
/*==============================================================*/
create table ORDERS
(
   ORDER_ID             int not null  comment '',
   USER_ID              int not null  comment '',
   CREATED_DATE         datetime not null  comment '',
   ORDER_FOR_DATE       datetime not null  comment '',
   TOTAL                int not null  comment '',
   ORDER_STATUS         varchar(100) not null  comment '',
   ORDER_DETAIL         text not null  comment '',
   ORDER_ADDRESS        text not null  comment '',
   primary key (ORDER_ID)
);

/*==============================================================*/
/* Table: ORDER_ITEM                                            */
/*==============================================================*/
create table ORDER_ITEM
(
   ORDER_ITEM_ID        int not null  comment '',
   ORDER_ID             int not null  comment '',
   MENU_ID              int not null  comment '',
   ORDER_QTY            int not null  comment '',
   primary key (ORDER_ITEM_ID)
);

/*==============================================================*/
/* Table: STOCK                                                 */
/*==============================================================*/
create table STOCK
(
   STOCK_ID             int not null  comment '',
   STOCK_NAME           varchar(100) not null  comment '',
   QTY                  int not null  comment '',
   STOCK_PRICE          int not null  comment '',
   STOCK_IMG_URL        text not null  comment '',
   UNIT_NAME            varchar(100) not null  comment '',
   primary key (STOCK_ID)
);

/*==============================================================*/
/* Table: USER                                                  */
/*==============================================================*/
create table USER
(
   USER_ID              int not null  comment '',
   USER_NAME            varchar(255) not null  comment '',
   EMAIL                varchar(100) not null  comment '',
   PASS                 varchar(100) not null  comment '',
   primary key (USER_ID)
);

alter table MENU_ITEM add constraint FK_MENU_ITE_MENU_ITEM_STOCK foreign key (STOCK_ID)
      references STOCK (STOCK_ID) on delete restrict on update restrict;

alter table MENU_ITEM add constraint FK_MENU_ITE_MENU_ITEM_MENU foreign key (MENU_ID)
      references MENU (MENU_ID) on delete restrict on update restrict;

alter table ORDERS add constraint FK_ORDERS_USER_ORDE_USER foreign key (USER_ID)
      references USER (USER_ID) on delete restrict on update restrict;

alter table ORDER_ITEM add constraint FK_ORDER_IT_ORDER_ITE_ORDERS foreign key (ORDER_ID)
      references ORDERS (ORDER_ID) on delete restrict on update restrict;

alter table ORDER_ITEM add constraint FK_ORDER_IT_ORDER_ITE_MENU foreign key (MENU_ID)
      references MENU (MENU_ID) on delete restrict on update restrict;

