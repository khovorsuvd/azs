

CREATE TABLE `company` (
  `company_name` varchar(45) NOT NULL,
  `registered_office` varchar(45) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`company_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO company VALUES
("Bel-Gas-Oil","г. Минск пр-т. Пушкина 34а","333195208");




CREATE TABLE `company_has_fuel` (
  `Company_company_name` varchar(45) NOT NULL,
  `fuel_code_fuel` varchar(7) NOT NULL,
  KEY `Company_company_name` (`Company_company_name`),
  KEY `fuel_code_fuel` (`fuel_code_fuel`),
  CONSTRAINT `company_has_fuel_ibfk_1` FOREIGN KEY (`Company_company_name`) REFERENCES `company` (`company_name`),
  CONSTRAINT `company_has_fuel_ibfk_2` FOREIGN KEY (`fuel_code_fuel`) REFERENCES `fuel` (`code_fuel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;






CREATE TABLE `contract` (
  `id_contract` int NOT NULL DEFAULT '1',
  `id_customer` int NOT NULL DEFAULT '1',
  `date_of_conclusion` date NOT NULL,
  PRIMARY KEY (`id_contract`),
  UNIQUE KEY `id_contract_UNIQUE` (`id_contract`),
  KEY `id_customer` (`id_customer`),
  CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`Id_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO contract VALUES
("1","1","2023-12-07");




CREATE TABLE `customer` (
  `Id_customer` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `address` varchar(45) DEFAULT NULL,
  `tet` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`Id_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO customer VALUES
("1","посетитель","не задано","-");




CREATE TABLE `fuel` (
  `code_fuel` varchar(7) NOT NULL,
  `fuel_type` varchar(45) NOT NULL,
  `unit_of_measuring` varchar(45) NOT NULL,
  `prise` float NOT NULL,
  `nameOFCompany` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`code_fuel`),
  UNIQUE KEY `code_fuel_UNIQUE` (`code_fuel`),
  KEY `nameOFCompany` (`nameOFCompany`),
  CONSTRAINT `fuel_ibfk_1` FOREIGN KEY (`nameOFCompany`) REFERENCES `fuelsuppliers` (`nameOFCompany`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO fuel VALUES
("бенз85","бензин","литр","3","Газпром"),
("бенз95","бензин","литр","2","Газпром"),
("бенз97","бензин","литр","2","Газпром"),
("газ01","газ","литр","1","Газпром"),
("газ02","газ","литр","1.4","Газпром"),
("газ03","газ","литр","1.6","Газпром");




CREATE TABLE `fuelsuppliers` (
  `nameOFCompany` varchar(45) NOT NULL,
  `contact_information` varchar(45) NOT NULL,
  `UNN` varchar(45) NOT NULL,
  PRIMARY KEY (`nameOFCompany`),
  UNIQUE KEY `nameOFCompany_UNIQUE` (`nameOFCompany`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO fuelsuppliers VALUES
("Альфаневть"," г. Москва ул. Островского","ИНН54545454"),
("Газонефтепром"," г. Москва ул. Главная 60","ИНН684379857"),
("Газпром"," г. Москва ул.Центральная 30","ИНН457963"),
("НефтеГазоБенз АЗС"," г. Москва ул.Павлова 45в","ИНН5859889"),
("Нефтепром"," г. Москва ул.Хвойная 30","ИНН5956566"),
("Нефтешторм"," г. Москва ул.Рябова 12","ИНН58598999"),
("РосГаз","Россия г. Москва Ул. Пушкина д.35","ИНН251985"),
("РосНефть","Россия г. Москва Ул. Пушкина д.32","ИНН4156678");




CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `fullsale` AS select `sale`.`id_sale` AS `id_sale`,`sale`.`Code_gas_station` AS `Code_gas_station`,`sale`.`date_of_sale` AS `date_of_sale`,`sale`.`customer_cardaccount` AS `customer_cardaccount`,`sale`.`code_fuel` AS `code_fuel`,`sale`.`quantityFuel` AS `quantityFuel`,`sale`.`contract_id_contract` AS `contract_id_contract`,`sale`.`contract_id_customer` AS `contract_id_customer`,`sale`.`worker` AS `worker`,`sale`.`summ` AS `summ`,`sale_has_product`.`product_title` AS `product_title`,`sale_has_product`.`quantityProduct` AS `quantityProduct` from (`sale` join `sale_has_product`) where (`sale`.`id_sale` = `sale_has_product`.`id_sale`);


INSERT INTO fullsale VALUES
("63","1","2023-12-12","","газ01","5","1","1","Tanya Andreeva","26.00","coffee","4"),
("63","1","2023-12-12","","газ01","5","1","1","Tanya Andreeva","26.00","моторное масло","1"),
("63","1","2023-12-12","","газ01","5","1","1","Tanya Andreeva","26.00","Вода минеральная","1"),
("63","1","2023-12-12","","газ01","5","1","1","Tanya Andreeva","26.00","Чипсы","1"),
("63","1","2023-12-12","","газ01","5","1","1","Tanya Andreeva","26.00","Печенье","1"),
("63","1","2023-12-12","","газ01","5","1","1","Tanya Andreeva","26.00","coffee","4"),
("63","1","2023-12-12","","газ01","5","1","1","Tanya Andreeva","26.00","Чипсы","3");




CREATE TABLE `gas_station` (
  `Code_gas_station` int NOT NULL,
  `company_name` varchar(45) NOT NULL,
  `address_gas_station` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Code_gas_station`),
  KEY `company_name` (`company_name`),
  CONSTRAINT `gas_station_ibfk_1` FOREIGN KEY (`company_name`) REFERENCES `company` (`company_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO gas_station VALUES
("1","Bel-Gas-Oil","г. Могилев ул. Челюскенцев 40"),
("2","Bel-Gas-Oil","г.Витебск ул. Ленина 14"),
("3","Bel-Gas-Oil","г.Бобруйск ул. Шелковая 13");




CREATE TABLE `login` (
  `user_name` varchar(10) NOT NULL,
  `password_` varchar(10) NOT NULL,
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `password_` (`password_`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO login VALUES
("1","1"),
("admin","admin"),
("dir","dir"),
("worker","worker");




CREATE TABLE `position` (
  `position` varchar(45) NOT NULL,
  `access_rights` varchar(45) NOT NULL,
  PRIMARY KEY (`position`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO position VALUES
("accountant","keep accounting record"),
("admin","administration db"),
("cleaner","clining area"),
("seller","sell products");




CREATE TABLE `product` (
  `product_title` varchar(45) NOT NULL,
  `prise` float NOT NULL,
  `product_id` int NOT NULL AUTO_INCREMENT,
  `productcol` int NOT NULL,
  PRIMARY KEY (`product_title`),
  UNIQUE KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO product VALUES
("coffee","3","15","372"),
("Батончик","1","11","10"),
("Вода минеральная","3.5","10","10"),
("моторное масло","40","8","10"),
("Омывайка","7","12","10"),
("Печенье","4","13","10"),
("Чипсы","4","14","7");




CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `productsell` AS select `product`.`product_title` AS `product_title`,`product`.`prise` AS `prise`,`product`.`product_id` AS `product_id`,`product`.`productcol` AS `productcol`,`sale`.`id_sale` AS `id_sale`,`sale`.`Code_gas_station` AS `Code_gas_station`,`sale`.`date_of_sale` AS `date_of_sale`,`sale`.`customer_cardaccount` AS `customer_cardaccount`,`sale`.`code_fuel` AS `code_fuel`,`sale`.`quantityFuel` AS `quantityFuel`,`sale`.`contract_id_contract` AS `contract_id_contract`,`sale`.`contract_id_customer` AS `contract_id_customer`,`sale`.`worker` AS `worker`,`sale`.`summ` AS `summ`,`sale_has_product`.`quantityProduct` AS `quantityProduct` from ((`sale_has_product` join `sale`) join `product`) where ((`product`.`product_title` = `sale_has_product`.`product_title`) and (`sale`.`id_sale` = `sale_has_product`.`id_sale`));


INSERT INTO productsell VALUES
("coffee","3","15","372","63","1","2023-12-12","","газ01","5","1","1","Tanya Andreeva","26.00","4"),
("моторное масло","40","8","10","63","1","2023-12-12","","газ01","5","1","1","Tanya Andreeva","26.00","1"),
("Вода минеральная","3.5","10","10","63","1","2023-12-12","","газ01","5","1","1","Tanya Andreeva","26.00","1"),
("Чипсы","4","14","7","63","1","2023-12-12","","газ01","5","1","1","Tanya Andreeva","26.00","1"),
("Печенье","4","13","10","63","1","2023-12-12","","газ01","5","1","1","Tanya Andreeva","26.00","1"),
("coffee","3","15","372","63","1","2023-12-12","","газ01","5","1","1","Tanya Andreeva","26.00","4"),
("Чипсы","4","14","7","63","1","2023-12-12","","газ01","5","1","1","Tanya Andreeva","26.00","3");




CREATE TABLE `sale` (
  `id_sale` int NOT NULL AUTO_INCREMENT,
  `Code_gas_station` int DEFAULT '1',
  `date_of_sale` date DEFAULT NULL,
  `customer_cardaccount` int DEFAULT NULL,
  `code_fuel` varchar(7) DEFAULT NULL,
  `quantityFuel` float DEFAULT NULL,
  `contract_id_contract` int DEFAULT '1',
  `contract_id_customer` int DEFAULT '1',
  `worker` varchar(45) DEFAULT NULL,
  `summ` double(7,2) DEFAULT NULL,
  PRIMARY KEY (`id_sale`),
  KEY `code_fuel` (`code_fuel`),
  KEY `Code_gas_station` (`Code_gas_station`),
  KEY `customer_card account` (`customer_cardaccount`),
  KEY `contract_id_contract` (`contract_id_contract`),
  KEY `sale_ibfk_4_idx` (`worker`),
  CONSTRAINT `sale_ibfk_1` FOREIGN KEY (`code_fuel`) REFERENCES `fuel` (`code_fuel`),
  CONSTRAINT `sale_ibfk_2` FOREIGN KEY (`Code_gas_station`) REFERENCES `gas_station` (`Code_gas_station`),
  CONSTRAINT `sale_ibfk_3` FOREIGN KEY (`customer_cardaccount`) REFERENCES `customer` (`Id_customer`),
  CONSTRAINT `sale_ibfk_4` FOREIGN KEY (`worker`) REFERENCES `worker` (`worker_name`),
  CONSTRAINT `sale_ibfk_5` FOREIGN KEY (`contract_id_contract`) REFERENCES `contract` (`id_contract`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci KEY_BLOCK_SIZE=2;


INSERT INTO sale VALUES
("63","1","2023-12-12","","газ01","5","1","1","Tanya Andreeva","26.00"),
("64","1","","","газ01","9","1","1","Tanya Andreeva",""),
("67","1","2023-12-12","1","газ02","60","1","1","Tanya Andreeva","84.00"),
("68","1","2023-12-12","1","газ03","60","1","1","Tanya Andreeva","96.00");




CREATE TABLE `sale_has_product` (
  `id_sale` int NOT NULL,
  `product_title` varchar(45) DEFAULT NULL,
  `quantityProduct` varchar(45) DEFAULT NULL,
  KEY `sale_id_sale` (`id_sale`),
  KEY `product_product_id` (`product_title`),
  CONSTRAINT `sale_has_product_ibfk_1` FOREIGN KEY (`id_sale`) REFERENCES `sale` (`id_sale`),
  CONSTRAINT `sale_has_product_ibfk_2` FOREIGN KEY (`product_title`) REFERENCES `product` (`product_title`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO sale_has_product VALUES
("63","coffee","4"),
("63","моторное масло","1"),
("63","Вода минеральная","1"),
("63","Чипсы","1"),
("63","Печенье","1"),
("63","coffee","4"),
("63","Чипсы","3");




CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `selrctview` AS select `fuel`.`code_fuel` AS `code_fuel`,`fuel`.`fuel_type` AS `fuel_type`,`fuel`.`unit_of_measuring` AS `unit_of_measuring`,`fuel`.`prise` AS `prise`,`fuel`.`nameOFCompany` AS `nameOFCompany`,`fuelsuppliers`.`contact_information` AS `contact_information`,`fuelsuppliers`.`UNN` AS `UNN` from (`fuel` join `fuelsuppliers`) where (`fuelsuppliers`.`nameOFCompany` = `fuel`.`nameOFCompany`);


INSERT INTO selrctview VALUES
("бенз85","бензин","литр","3","Газпром"," г. Москва ул.Центральная 30","ИНН457963"),
("бенз95","бензин","литр","2","Газпром"," г. Москва ул.Центральная 30","ИНН457963"),
("бенз97","бензин","литр","2","Газпром"," г. Москва ул.Центральная 30","ИНН457963"),
("газ01","газ","литр","1","Газпром"," г. Москва ул.Центральная 30","ИНН457963"),
("газ02","газ","литр","1.4","Газпром"," г. Москва ул.Центральная 30","ИНН457963"),
("газ03","газ","литр","1.6","Газпром"," г. Москва ул.Центральная 30","ИНН457963");




CREATE TABLE `worker` (
  `position` varchar(45) DEFAULT NULL,
  `worker_name` varchar(45) NOT NULL,
  `date_of_birth` date NOT NULL,
  `tel` varchar(45) NOT NULL,
  `date_of_offer` date DEFAULT NULL,
  `id_worker` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`worker_name`),
  KEY `position` (`position`),
  CONSTRAINT `worker_ibfk_1` FOREIGN KEY (`position`) REFERENCES `position` (`position`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO worker VALUES
("seller","Tanya Andreeva","1999-07-24","375333195208","2021-11-10",""),
("cleaner","Домодедов Игорь Петрович","1965-04-15","+375455812358","2002-12-01",""),
("seller","Иванов  Иван Иванович ","1977-02-14","+375333195209","1991-04-15",""),
("accountant","Кириллович Иван Денисович","1989-04-18","+375122488958","2023-11-27",""),
("seller","Медвельева Алина Петровна","1978-10-28","+375455812358","2002-12-01",""),
("cleaner","Никитин Илья Фёдорович","1987-09-08","+37577821205","2022-08-04",""),
("admin","Петров Иван Анатольевич","1974-07-24","+37584567","1998-12-17",""),
("seller","Попов Вадим Игоревич","1998-01-02","+37588885595","2020-05-24",""),
("admin","Яцкевич Леонид Петрович","1987-10-28","+375455812358","2013-12-01","");




CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `workersell` AS select `worker`.`worker_name` AS `worker_name`,`sale`.`id_sale` AS `id_sale`,`sale`.`Code_gas_station` AS `Code_gas_station`,`sale`.`date_of_sale` AS `date_of_sale`,`sale`.`customer_cardaccount` AS `customer_cardaccount`,`sale`.`code_fuel` AS `code_fuel`,`sale`.`quantityFuel` AS `quantityFuel`,`sale`.`contract_id_contract` AS `contract_id_contract`,`sale`.`contract_id_customer` AS `contract_id_customer`,`sale`.`worker` AS `worker`,`sale`.`summ` AS `summ` from (`worker` join `sale`) where (`worker`.`worker_name` = `sale`.`worker`);


INSERT INTO workersell VALUES
("Tanya Andreeva","63","1","2023-12-12","","газ01","5","1","1","Tanya Andreeva","26.00"),
("Tanya Andreeva","64","1","","","газ01","9","1","1","Tanya Andreeva",""),
("Tanya Andreeva","67","1","2023-12-12","1","газ02","60","1","1","Tanya Andreeva","84.00"),
("Tanya Andreeva","68","1","2023-12-12","1","газ03","60","1","1","Tanya Andreeva","96.00");




CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `workerview` AS select `worker`.`position` AS `position`,`worker`.`worker_name` AS `worker_name`,`worker`.`date_of_birth` AS `date_of_birth`,`worker`.`tel` AS `tel`,`worker`.`date_of_offer` AS `date_of_offer`,`worker`.`id_worker` AS `id_worker`,`position`.`access_rights` AS `access_rights` from (`worker` join `position`) where (`worker`.`position` = `position`.`position`);


INSERT INTO workerview VALUES
("accountant","Кириллович Иван Денисович","1989-04-18","+375122488958","2023-11-27","","keep accounting record"),
("admin","Петров Иван Анатольевич","1974-07-24","+37584567","1998-12-17","","administration db"),
("admin","Яцкевич Леонид Петрович","1987-10-28","+375455812358","2013-12-01","","administration db"),
("cleaner","Домодедов Игорь Петрович","1965-04-15","+375455812358","2002-12-01","","clining area"),
("cleaner","Никитин Илья Фёдорович","1987-09-08","+37577821205","2022-08-04","","clining area"),
("seller","Tanya Andreeva","1999-07-24","375333195208","2021-11-10","","sell products"),
("seller","Иванов  Иван Иванович ","1977-02-14","+375333195209","1991-04-15","","sell products"),
("seller","Медвельева Алина Петровна","1978-10-28","+375455812358","2002-12-01","","sell products"),
("seller","Попов Вадим Игоревич","1998-01-02","+37588885595","2020-05-24","","sell products");


