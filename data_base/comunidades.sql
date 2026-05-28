CREATE TABLE IF NOT EXISTS categories (
    id      INTEGER PRIMARY KEY AUTOINCREMENT,
    nom     TEXT NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS usuaris (
    id          INTEGER PRIMARY KEY AUTOINCREMENT,
    nom         TEXT NOT NULL UNIQUE,
    contrasenya TEXT NOT NULL,
    rol         TEXT NOT NULL DEFAULT 'usuari',
    creat_el    DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS productes (
    id           INTEGER PRIMARY KEY AUTOINCREMENT,
    nom          TEXT NOT NULL,
    descripcio   TEXT,
    preu         REAL NOT NULL,
    imatge       TEXT,
    valoracio    REAL DEFAULT 0,
    num_valoracions INTEGER DEFAULT 0,
    categoria_id INTEGER,
    creat_el     DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (categoria_id) REFERENCES categories(id)
);

INSERT INTO categories (nom) VALUES
    ('Energia Solar'),
    ('Mobilitat Sostenible'),
    ('Compostatge i Residus'),
    ('Estalvi d''Aigua'),
    ('Construcció Verda');

INSERT INTO usuaris (nom, contrasenya, rol) VALUES
    ('admin', 'admin123', 'admin'),
    ('usuari1', 'usuari123', 'usuari');

INSERT INTO productes (nom, descripcio, preu, imatge, valoracio, num_valoracions, categoria_id) VALUES
(
    'Panell Solar 400W Monocristal·lí',
    'Panell solar d''alta eficiència per a instal·lacions residencials. Resistents a condicions meteorològiques extremes i amb 25 anys de garantia de rendiment.',
    299.99,
    'https://images.unsplash.com/photo-1509391366360-2e959784a276?w=400',
    4.8, 124,
    1
),
(
    'Kit Solar Complet 2000W',
    'Kit complet amb 5 panells de 400W, inversor, bateries i tots els accessoris necessaris per a una instal·lació autònoma.',
    1899.00,
    'https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?w=400',
    4.7, 89,
    1
),
(
    'Carregador Solar Portàtil 20W',
    'Carregador solar plegable per a dispositius mòbils i petits aparells. Ideal per a activitats a l''aire lliure.',
    49.99,
    'data:image/webp;base64,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',
    4.5, 203,
    1
),
(
    'Bateria d''Emmagatzematge Solar 5kWh',
    'Bateria de liti d''alta capacitat per emmagatzemar l''energia solar generada. Compatible amb la majoria d''inversors del mercat.',
    899.00,
    'https://th.bing.com/th/id/OIP.McPoM4jjN7X4a5BkDk9NKwHaHa?w=201&h=201&c=7&r=0&o=7&pid=1.7&rm=3',
    4.6, 67,
    1
),

(
    'Bicicleta Elèctrica Urbana',
    'Bicicleta elèctrica amb motor de 250W i bateria de 36V. Autonomia de 80km per càrrega. Ideal per a desplaçaments urbans diaris.',
    899.00,
    'https://th.bing.com/th/id/OIP.EEjIzw53KGavu63dw8PtKAHaEs?w=275&h=180&c=7&r=0&o=7&pid=1.7&rm=3',
    4.9, 312,
    2
),
(
    'Patinet Elèctric 350W',
    'Patinet elèctric plegable amb autonomia de 40km. Fre regeneratiu, llums LED i aplicació mòbil per monitoritzar el consum.',
    449.00,
    'https://www.google.com/imgres?q=Patinet%20El%C3%A8ctric%20350W&imgurl=http%3A%2F%2Fsyxmoto.com%2Fcdn%2Fshop%2Ffiles%2FES8501.png%3Fv%3D1758181922&imgrefurl=https%3A%2F%2Fsyxmoto.com%2Fes%2Fproducts%2F350w-ultra-lightweight-commuter-e-scooter-with-smart-app-control%3Fsrsltid%3DAfmBOoqyAuhJf1IbvL6TqW-E3yygqz_FC67bw2_rvvy3sqt6Tn6mEhZz&docid=ajqj6v2jhiizWM&tbnid=PK7KPlUszqRsGM&vet=12ahUKEwj1uMq3qtuUAxVrVkEAHYjaF6UQnPAOegQIHhAB..i&w=1024&h=1024&hcb=2&ved=2ahUKEwj1uMq3qtuUAxVrVkEAHYjaF6UQnPAOegQIHhAB',
    4.4, 178,
    2
),
(
    'Càrregador Vehicle Elèctric 7kW',
    'Estació de càrrega domèstica per a vehicles elèctrics. Instal·lació senzilla i compatible amb tots els vehicles del mercat europeu.',
    599.00,
    'https://th.bing.com/th/id/OIP.-ycZt_Mr_KlrLmvXJCmz6AHaHa?w=193&h=193&c=7&r=0&o=7&pid=1.7&rm=3',
    4.7, 95,
    2
),

(
    'Compostador Domèstic 300L',
    'Compostador de jardí fabricat amb plàstic reciclat. Capacitat de 300L per transformar residus orgànics en adob natural.',
    79.99,
    'https://cdnx.jumpseller.com/denda/image/45456338/resize/1200/1200?1707848973',
    4.3, 156,
    3
),
(
    'Vermicultor Urbà',
    'Sistema de vermicompostatge per a interiors. Transforma restes de menjar en adob líquid d''alta qualitat en pocs setmanes.',
    59.99,
    'https://th.bing.com/th/id/OIP.M0GgvrmrOnR1S-gjckfuQAHaFb?w=248&h=181&c=7&r=0&o=7&pid=1.7&rm=3',
    4.6, 98,
    3
),
(
    'Kit Reciclatge 5 Contenidors',
    'Conjunt de 5 cubells de reciclatge amb tapes de colors per separar paper, plàstic, vidre, orgànic i rebuig.',
    39.99,
    'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?w=400',
    4.2, 241,
    3
),

(
    'Dipòsit Recollida Aigua Pluvial 1000L',
    'Dipòsit soterrat per recollir i reutilitzar l''aigua de pluja per a reg i altres usos no potables. Inclou sistema de filtratge.',
    349.00,
    'https://th.bing.com/th/id/OIP.9l0hTWWl0IAqBy2IJwWOkgHaHa?w=202&h=202&c=7&r=0&o=7&pid=1.7&rm=3',
    4.5, 72,
    4
),
(
    'Sistema Reg Goteig Intel·ligent',
    'Sistema de reg automatitzat amb sensors d''humitat i connectivitat Wi-Fi. Estalvia fins al 60% d''aigua respecte al reg convencional.',
    129.99,
    'https://th.bing.com/th/id/OIP.8A1Q67XG_uUBDUJT_gV_CgHaIS?w=176&h=196&c=7&r=0&o=7&pid=1.7&rm=3',
    4.7, 134,
    4
),
(
    'Airejadors Estalviadors Aigua (Pack 5)',
    'Airejadors per a aixetes que redueixen el consum d''aigua fins al 50% sense perdre pressió. Fàcil instal·lació.',
    19.99,
    'https://www.savinga.es/img/dsc/aireador-de-ahorro-de-agua-ecovand-pro-4-l-min-con-junta-1819841.webp',
    4.1, 389,
    4
),

(
    'Aïllament Tèrmic Natural de Suro',
    'Plaques d''aïllament tèrmic fabricades amb suro natural. Material sostenible, biodegradable i excel·lent aïllant tèrmic i acústic.',
    89.99,
    'https://th.bing.com/th/id/OIP.-6qaG1c0Hok_JmbVc2OziAHaE8?w=233&h=180&c=7&r=0&o=7&pid=1.7&rm=3',
    4.6, 83,
    5
),
(
    'Pintura Ecològica sense VOC (5L)',
    'Pintura interior d''alt rendiment sense compostos orgànics volàtils. Fabricada amb pigments naturals i base d''aigua.',
    34.99,
    'https://th.bing.com/th/id/OIP.UH_LUmEs1wi5GTivabILjAHaHa?w=170&h=180&c=7&r=0&o=7&pid=1.7&rm=3',
    5, 45, 4
),
(
    'Teula Solar Integrada (m²)',
    'Teules fotovoltaiques que s''integren estèticament a la coberta de l''edifici. Generen energia sense alterar l''aspecte de la façana.',
    189.00,
    'https://th.bing.com/th/id/OIP.WBtTKdm3JW_aZmhdcQIJ0QHaEK?w=326&h=183&c=7&r=0&o=7&pid=1.7&rm=3',
    4.8, 45,
    5
);