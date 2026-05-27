-- =============================================
-- EcoCity · Base de dades SQLite
-- =============================================

-- TAULA CATEGORIES
CREATE TABLE IF NOT EXISTS categories (
    id      INTEGER PRIMARY KEY AUTOINCREMENT,
    nom     TEXT NOT NULL UNIQUE
);

-- TAULA USUARIS
CREATE TABLE IF NOT EXISTS usuaris (
    id          INTEGER PRIMARY KEY AUTOINCREMENT,
    nom         TEXT NOT NULL UNIQUE,
    contrasenya TEXT NOT NULL,
    rol         TEXT NOT NULL DEFAULT 'usuari',
    creat_el    DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- TAULA PRODUCTES
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

-- =============================================
-- DADES INICIALS
-- =============================================

-- CATEGORIES
INSERT INTO categories (nom) VALUES
    ('Energia Solar'),
    ('Mobilitat Sostenible'),
    ('Compostatge i Residus'),
    ('Estalvi d''Aigua'),
    ('Construcció Verda');

-- USUARIS (contrasenya: admin123)
INSERT INTO usuaris (nom, contrasenya, rol) VALUES
    ('admin', 'admin123', 'admin'),
    ('usuari1', 'usuari123', 'usuari');

-- PRODUCTES
INSERT INTO productes (nom, descripcio, preu, imatge, valoracio, num_valoracions, categoria_id) VALUES

-- Energia Solar
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
    'https://images.unsplash.com/photo-1617788138017-80ad40651399?w=400',
    4.5, 203,
    1
),
(
    'Bateria d''Emmagatzematge Solar 5kWh',
    'Bateria de liti d''alta capacitat per emmagatzemar l''energia solar generada. Compatible amb la majoria d''inversors del mercat.',
    899.00,
    'https://images.unsplash.com/photo-1593941707882-a5bba14938c7?w=400',
    4.6, 67,
    1
),

-- Mobilitat Sostenible
(
    'Bicicleta Elèctrica Urbana',
    'Bicicleta elèctrica amb motor de 250W i bateria de 36V. Autonomia de 80km per càrrega. Ideal per a desplaçaments urbans diaris.',
    899.00,
    'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400',
    4.9, 312,
    2
),
(
    'Patinet Elèctric 350W',
    'Patinet elèctric plegable amb autonomia de 40km. Fre regeneratiu, llums LED i aplicació mòbil per monitoritzar el consum.',
    449.00,
    'https://images.unsplash.com/photo-1571068316344-75bc76f77890?w=400',
    4.4, 178,
    2
),
(
    'Càrregador Vehicle Elèctric 7kW',
    'Estació de càrrega domèstica per a vehicles elèctrics. Instal·lació senzilla i compatible amb tots els vehicles del mercat europeu.',
    599.00,
    'https://images.unsplash.com/photo-1593941707882-a5bba14938c7?w=400',
    4.7, 95,
    2
),

-- Compostatge i Residus
(
    'Compostador Domèstic 300L',
    'Compostador de jardí fabricat amb plàstic reciclat. Capacitat de 300L per transformar residus orgànics en adob natural.',
    79.99,
    'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=400',
    4.3, 156,
    3
),
(
    'Vermicultor Urbà',
    'Sistema de vermicompostatge per a interiors. Transforma restes de menjar en adob líquid d''alta qualitat en pocs setmanes.',
    59.99,
    'https://images.unsplash.com/photo-1530836369250-ef72a3f5cda8?w=400',
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

-- Estalvi d'Aigua
(
    'Dipòsit Recollida Aigua Pluvial 1000L',
    'Dipòsit soterrat per recollir i reutilitzar l''aigua de pluja per a reg i altres usos no potables. Inclou sistema de filtratge.',
    349.00,
    'https://images.unsplash.com/photo-1541252260730-0412e8e2108e?w=400',
    4.5, 72,
    4
),
(
    'Sistema Reg Goteig Intel·ligent',
    'Sistema de reg automatitzat amb sensors d''humitat i connectivitat Wi-Fi. Estalvia fins al 60% d''aigua respecte al reg convencional.',
    129.99,
    'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=400',
    4.7, 134,
    4
),
(
    'Airejadors Estalviadors Aigua (Pack 5)',
    'Airejadors per a aixetes que redueixen el consum d''aigua fins al 50% sense perdre pressió. Fàcil instal·lació.',
    19.99,
    'https://images.unsplash.com/photo-1585771724684-38269d6639fd?w=400',
    4.1, 389,
    4
),

-- Construcció Verda
(
    'Aïllament Tèrmic Natural de Suro',
    'Plaques d''aïllament tèrmic fabricades amb suro natural. Material sostenible, biodegradable i excel·lent aïllant tèrmic i acústic.',
    89.99,
    'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=400',
    4.6, 83,
    5
),
(
    'Pintura Ecològica sense VOC (5L)',
    'Pintura interior d''alt rendiment sense compostos orgànics volàtils. Fabricada amb pigments naturals i base d''aigua.',
    34.99,
    'https://images.unsplash.com/photo-1562259929-b4e1fd3aef09?w=400',
    4.4, 167,
    5
),
(
    'Teula Solar Integrada (m²)',
    'Teules fotovoltaiques que s''integren estèticament a la coberta de l''edifici. Generen energia sense alterar l''aspecte de la façana.',
    189.00,
    'https://images.unsplash.com/photo-1509391366360-2e959784a276?w=400',
    4.8, 45,
    5
);