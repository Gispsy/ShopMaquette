USE ShopMaquette;

INSERT INTO fournisseur (id, nom, adresse, ville, cp, pays)
VALUES
(1,     'BANDAI',           '5 bd Volataire',           'Paris',    '75011',    'France'),
(2,     'RiseOfGunpla',     '6 pl du 25 aout 1944',     'Paris',    '75014',    'France'),
(3,     '1001 Hobbies',     '2 Pass Philippe August',    'Paris',   '75011',    'France');

INSERT INTO categorie(id, nom, image, update_at)
VALUES
(1,     'ModelKit', '1166536.jpg', '2023-08-18 11:24:38'),
(2,     'Materiel', '1166536.jpg', '2023-08-18 11:24:38');

INSERT INTO sous_categorie(id, nom, image, categorie_id, update_at)
VALUES
(1,     'FG',               '1166536.jpg',      1, '2023-08-18 11:24:38'),
(2,     'HG',               '1166536.jpg',      1, '2023-08-18 11:24:38'),
(3,     'RG',               '1166536.jpg',      1, '2023-08-18 11:24:38'),
(4,     'MG',               '1166536.jpg',      1, '2023-08-18 11:24:38'),
(5,     'PerfectGrade',     '1166536.jpg',      1, '2023-08-18 11:24:38'),
(6,     'SD',               '1166536.jpg',      1, '2023-08-18 11:24:38'),
(7,     'RE/100',           '1166536.jpg',      1, '2023-08-18 11:24:38');

INSERT INTO produit (id, fournisseur_id, publicité, nom, quantiter, description, prix_phut)
VALUES
(1, 1, 1, 'HG Gundam Barbatos',                                                                 1, 'Gundam Barbatos, Gundam Iron the blood',                1),
(2, 2, 0, 'HG Gundam Barbatos Lupus',                                                           2, 'Gundam Barbatos Lupus, Gundam Iron the blood',          2),
(3, 1, 0, 'RG Gundam Freedom ',                                                                 3, 'Gundam Freedom, Mobile-suit gundam seed',               3),
(4, 3, 0, 'RG Gundam Barbatos Lupus Rex',                                                       4, 'Gundam Barbatos Lupus Rex, Gundam Iron the blood ',     4),
(5, 3, 0, 'MG Gundam God',                                                                      5, 'God Gundam !',                                          5),
(6, 3, 0, 'MG Gundam Astray',                                                                   6, 'Gundam Astray ',                                        6),
(7, 2, 0, 'PerfectGrade Gundam Unicorn',                                                        7, 'PerfectGrade Gundam Unicorn',                           7),
(8, 1, 0, 'PerfectGrade Gundam Exia',                                                           8, 'PerfectGrade Gundam Exia',                              8),
(9, 3, 1, 'SD Gundam',                                                                          9, 'SD Gundam, Mobile-suit Gundam',                         9),
(10, 2, 0,'SD Gundam 00',                                                                      10, 'SD Gundam 00, Gundam 00',                               10),
(11, 2, 0,'RE/100 Guncanon Detector',                                                          11, 'RE/100 Guncanon Detector',                              11),
(12, 2, 0,'RE/100 Gun EZ',                                                                     12, 'RE/100 Gun EZ',                                         12),
(13, 2, 0,'HG Gundam Floraus',                                                                 13, 'HG Gundam Flauros, Gundam Iron the blood',              13),
(14, 2, 0,'HG Gundam rebake full city',                                                        14, 'HG Gundam Rebake full city, gundam iron the blood',     14),
(15, 3, 0,'RG Gundam Strike',                                                                  15, 'RG Gundam Strike, Mobile-suit gundam seed',             15),
(16, 2, 0,'RG Gundam Justice',                                                                 16, 'RG Gundam Justice, Mobile-suit gundam seed',            16),
(17, 3, 0,'MG Gundam Astray',                                                                  17, 'MG Gundam Astray',                                      17),
(18, 1, 0,'MG Gundam GN-05 Virtue',                                                            18, 'MG GN-05 Gundam Virtue, Gundam 00',                     18),
(19, 3, 0,'PerfectGrade Gundam Unicorn 02 Banshee Orn',                                        19, 'PerfectGrade Gundam 02 Unicorn Banshee Orn',            19),
(20, 2, 0,'PerfectGrade Gundam Perfect Strike',                                                20, 'PerfectGrade Gundam Strike, mobile-suit Gundam seed',   20),
(21, 3, 0,'SD Wing Gundam Zero',                                                               21, 'SD Wing Gundam Zero',                                   21),
(22, 1, 0,'SD Strike Freedom Gundam',                                                          22, 'SD Strike Freedom Gundam, Mobil-suit gundam seed',      22),
(23, 2, 1,'RE/100 Hamma-Hamma',                                                                23, 'RE/100 Hamma-Hamma',                                    23),
(24, 3, 1,'RE/100 Vigna Ghina',                                                                24, 'RE/100 Vigna Ghina',                                    24),
(25, 1, 0,'HG Gundam Aeriel',                                                                  25, 'HG Gundam Aeriel, the whitch from mercury',             25),
(26, 1, 0,'HG Gundam Lifrit',                                                                  26, 'HG Gundam Lifrit, the whitch from mercury',             26),
(27, 1, 0,'HG Gundam Pharact',                                                                 27, 'HG Gundam Pharact, the whitch from mercury',            27),
(28, 1, 0,'HG Gundam Schwarzette',                                                             28, 'HG Gundam Schwarzette, the whitch from mercury',        28),
(29, 1, 0,'HG Gundam Calibarn',                                                                29, 'HG Gundam Calibarn, the whitch from mercury',           29),
(30, 3, 0,'HG Daribalde',                                                                      30, 'HG Daribalde, the whitch from mercury',                 30);

INSERT INTO Image(id, nom, produi_id)
VALUES
(1, 'Burn of unspecified eyelid and periocular area, sequela',              1),
(2, 'Other dental procedure status',                                        2),
(3, 'Nondisp transverse fx left acetab, subs for fx w delay heal',          3),
(4, 'Lymphocytic colitis',                                                  4),
(5, 'Oth osteopor w crnt path fx, unsp ank/ft, 7thK',                       5),
(6, 'Laceration of fallopian tube, unilateral, initial encounter',          6),
(7, 'Insect bite of other specified part of neck, init encntr',             7),
(8, 'Temporary auditory threshold shift, bilateral',                        8),
(9, 'Other specified dyspareunia',                                          9),
(10, 'Oth vascular syndromes of brain in cerebrovascular diseases',         10),
(11, 'I/I react d/t implanted testicular prosthesis, init',                 11),
(12, 'Ataxia following nontraumatic subarachnoid hemorrhage',               12),
(13, 'Macular corneal dystrophy',                                           13),
(14, 'Wear of articular bearing surface of internal prosth joint',          14),
(15, 'Contus/lac cereb, w LOC >24 hr w ret consc lev',                      15),
(16, 'Subluxation of midcarpal joint of unspecified wrist',                 16),
(17, 'Anterior disloc of proximal end of tibia, left knee, subs',           17),
(18, 'Burn of first degree of single l finger (nail) except thumb',         18),
(19, 'Congenital deformity of sternocleidomastoid muscle',                  19),
(20, 'Disp fx of shaft of 5th MC bone, r hand, 7thD',                       20),
(21, 'Malignant neoplasm of overlapping sites of stomach',                  21),
(22, 'Corrosion of unsp degree of right scapular region, init',             22),
(23, 'Hyperostosis of skull',                                               23),
(24, 'Oth enthesopathies of unspecified lower limb, excluding foot',        24),
(25, 'Nondisp fx of proximal phalanx of right index finger',                25),
(26, 'Other and unspecified malignant neoplasm of skin',                    26),
(27, 'Ultralt/microlt/pwr-glider explosn inj occupant, sequela',            27),
(28, 'Nondisp fx of lateral epicondyl of unsp humer, 7thG',                 28),
(29, 'Contus/lac l cereb w LOC w death due to oth cause bf consc',          29),
(30, 'Caught, crushed, jammed or pinched in or between objects',            30),
(31, 'Sltr-haris Type IV physeal fx lower end of right femur, init',        31),
(32, 'Displaced Rolando''s fracture, left hand',                            32),
(33, 'Occupant of hv veh injured in collision w 2/3-whl mv',                33),
(34, 'Prsn brd/alit pk-up/van inj in clsn w nonmtr vehicle, sqla',          34),
(35, 'Corrosion of third degree of right wrist, sequela',                   35),
(36, 'Adult osteomalacia due to malnutrition',                              36),
(37, 'Unsp inj unsp blood vess at forarm lv, right arm, sequela',           37),
(38, 'Laceration with foreign body of unsp upper arm, subs encntr',         38),
(39, 'Exposure to rapid changes in air pressure during descent',            39),
(40, 'Spinal enthesopathy, thoracic region',                                40),
(41, 'Athscl native arteries of extremities w gangrene, right leg',         41),
(42, 'Glaucoma sec to eye inflam, unsp eye, indeterminate stage',           42),
(43, 'Disp fx of less tuberosity of r humer, 7thK',                         43),
(44, 'Athscl CABG, unsp, w angina pectoris w documented spasm',             44),
(45, 'Poisoning by unsp topical agent, undetermined, sequela',              45),
(46, 'Maternal care for other isoimmunization, second trimester',           46),
(47, 'Nondisp fx of less trochanter of r femr, 7thJ',                       47),
(48, 'Open wound of forearm',                                               48),
(49, 'Iridodialysis, bilateral',                                            49),
(50, 'Hyphema, right eye',                                                  50);

INSERT INTO Client(CliID, CliNom, CliPrenom, CliAdresse, CliVille, CliPays, CliCp, CliNumero, CliAdresseMail, CliReference, CliType, CliCalcuCoef)
VALUES
(1, 'Rowena',   'Gretal',   '16th Floor',   'Santiago del Torno',   'Bolivia',      '13300', '619-612-3328',    'gshurlock0@imgur.com',         1, true, 91841633),
(2, 'Heath',    'Maury',    'Suite 16',     'Hongqi',               'China',        '14000', '635-297-8987',    'mpatton1@examiner.com',        2, true, 28983047),
(3, 'Willi',    'Agna',     'Room 901',     'Xucheng',              'France',       '80000', '817-108-3810',    'abusfield2@prweb.com',         3, true, 46242993),
(4, 'Fianna',   'Cordi',    '3rd Floor',    'Jiaoba',               'China',        '54200', '630-239-1089',    'chuerta3@indiatimes.com',      4, true, 2277904),
(5, 'Suzette',  'Marthe',   'Apt 718',      'Partesh',              'Kosovo',       '60000', '643-778-5085',    'mosharkey4@unc.edu',           5, true, 80827745),
(6, 'Mariam',   'Sydel',    'Room 357',     'Amiens',               'France',       '80000', '178-740-2444',    'scleugh5@wikia.com',           6, true, 45921230),
(7, 'Jodi',     'Velma',    'PO Box 26092', 'Badarganj',            'Bangladesh',   '5430', '630-748-6135',     'vgiriardelli6@slate.com',      7, true, 7543882),
(8, 'Merwin',   'Kip',      'Suite 72',     'Seoul',                'South Korea',  '16600', '822-302-0659',    'kvanthoog7@microsoft.com',     8, true, 21695230),
(9, 'Bay',      'Ilario',   '1st Floor',    'Achanizo',             'Peru',         '25000', '190-723-7625',    'islessar8@lycos.com',          9, false, 79252135),
(10,'Calvin',   'Della',     '17th Floor',  'Konde',                'Tanzania',     '85000', '405-315-2905',    'dhaeslier9@prnewswire.com',    10, true, 61593641);

INSERT INTO Employer (EmpId, EmpNom, EmpPrenom, EmpAdresse, EmpVille, EmpPays, EmpCp, EmpDateNaissance, EmpEquipe)
VALUES
(1, 'Montague',     'Maisie',       '1 Rue de Libourne',            'Paris',            'France',       '80000',        '1996-09-22', false),
(2, 'Lynda',        'Fanny',        '36 Rue Bézout',                'Paris',            'France',       '39810',        '2014-12-12', false),
(3, 'Welsch',       'Aurélie',      '77 Rue des Jacobins',          'Amiens',           'France',       '81090',        '2004-04-30', true),
(4, 'Skyrim',       'Lidia',        '75 Rue Basse',                 'Lille',            'France',       '59800',        '2001-10-16', false),
(5, 'Ellery',       'Tore',         '78 Rue de Lourmel',            'Paris',            'France',       '50000',        '2013-05-14', true);

INSERT INTO Commande (ComId, ComRef, ComTVA, ComDateCommande, ComAdresseLivraison, ComCpLiv, ComVilleLiv, ComAdressFactu, ComCpFactu, ComVillFactu, ComTotalPrixHT, ComTVATotal, CliId, ComQuantiter, ProId)
VALUES
(1, 1, 35, '2023-02-18', 'Apt 814',       '70690',              'Seremban',                 'Room 881',         '70690',        'Seremban',             5.2,        35, 1, 1, 1),
(2, 2, 24, '2022-11-24', 'PO Box 23241',  '09450-000',          'Rio Grande da Serra',      'Suite 13',         '09450-000',    'Rio Grande da Serra',  20.0,       55, 2, 2, 2),
(3, 3, 26, '2022-12-25', 'PO Box 80331',  '8000',               'Gobojango',                '4th Floor',        '8000',         'Gobojango',            200.2,      25, 3, 3, 3),
(4, 4, 99, '2022-12-19', '5th Floor',     '7940-374',           'Vila Alva',                'PO Box 98231',     '7940-374',     'Vila Alva',            20.2,       45, 4, 4, 4),
(5, 5, 51, '2023-02-26', '16th Floor',    '9360-413',           'Madalena do Mar',          'PO Box 36213',     '9360-413',     'Madalena do Mar',      25.1,       65, 5, 5, 5);

INSERT INTO BonLivraison (BonLivID, BonLivComRef, BonLivDateLivraison, ComId, ProId, CliID)
VALUES
(1, '556-529-3962',     '2022-11-15', 1, 1, 1),
(2, '366-573-0721',     '2022-12-31', 2, 2, 2),
(3, '491-790-7621',      '2022-11-10', 3, 3, 3),
(4, '614-342-7365',      '2022-07-06', 4, 4, 4),
(5, '619-249-3654',      '2022-08-27', 5, 5, 5);

INSERT INTO Facture (BonFactuId, BonDateFactu, ComId) 
values 
(1, '2022-01-21', 1),
(2, '2022-06-03', 2),
(3, '2022-05-02', 3),
(4, '2022-08-27', 4),
(5, '2022-04-29', 5);