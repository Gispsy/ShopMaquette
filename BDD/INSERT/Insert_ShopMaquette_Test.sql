USE shopmaquette;

INSERT INTO Fournisseurs (FouID, FouNom, FouAdresse, FouVille, FouCp, FouPays, FouRef)
VALUES
(1,     'Skyble',       'Room 732',     'Essen',    '45356',    'Germany',  1),
(2,     'Browsedrive',  'PO Box 62119', 'Bremen',   '28239',    'Germany',  2),
(3,     'Dablist',      'Suite 30',     'Bremen',   '28355',    'Germany',  3),
(4,     'Oyoyo',        'Room 484',     'München',  '81679',    'Germany',  4),
(5,     'Feedspan',     'PO Box 49176', 'Nürnberg', '90451',    'Germany',  5);

INSERT INTO Categorie(CtgId, CtgNom, CtgImg)
VALUES
(1,     'Maquette', '1166536.jpg'),
(2,     'Kit', '1166536.jpg'),
(3,     'Peinture', '1166536.jpg'),
(4,     'Outils', '1166536.jpg');


INSERT INTO SousCategorie(SctgId, SctgNom, SctgImg, CtgId)
VALUES
(1,     'Mort',     '1166536.jpg',     1),
(2,     'Javier',   '1166536.jpg',   2),
(3,     'Mohammed', '1166536.jpg', 3),
(4,     'Ealasaid', '1166536.jpg', 4),
(5,     'Arlee',    '1166536.jpg',    4),
(6,     'Elbert',   '1166536.jpg',   2),
(7,     'Rowe',     '1166536.jpg',     1),
(8,     'Pryce',    '1166536.jpg',    1);

INSERT INTO Produit (ProID, FouID, SctgId, ProNom, ProQuantiter, ProDesc, ProPrixPHUT)
VALUES
(1, 1, 2, 'Balsam Poplar',                                                              1, 'Typhoid fever unspecified', 1),
(2, 2, 1, 'acetaminophen and codeine phosphate',                                        2, 'Adult T-cell lymphoma/leukemia (HTLV-1-assoc) in remission', 2),
(3, 3, 3, 'Cefazolin',                                                                  3, 'Disp fx of med malleolus of r tibia, 7thB', 3),
(4, 4, 5, 'Propofol',                                                                   4, 'Unsp fx low end l femr, subs for opn fx type I/2 w malunion', 4),
(5, 5, 4, 'fentanyl',                                                                   5, 'Oth disp fx of lower end of l humer, subs for fx w malunion', 5),
(6, 2, 4, 'acetaminophen dextromethorphan HBr doxylamine succinate',                    6, 'Perforated corneal ulcer bilateral', 6),
(7, 4, 3, 'Phenylephrine hydrochloride',                                                7, 'Chronic venous htn w oth comp of bilateral low extrm', 7),
(8, 5, 2, 'neomycin sulfate polymyxin b sulfate and gramicidin',                        8, 'Achondrogenesis', 8),
(9, 3, 1, 'Ibuprofen',                                                                  9, 'Burn of third degree of left forearm sequela', 9),
(10, 2, 2, 'Ranitidine',                                                                10, 'Burn of unsp degree of left scapular region subs encntr', 10),
(11, 2, 3, 'Guaifenesin',                                                               11, 'Disp fx of right tibial spine subs for clos fx w malunion', 11),
(12, 2, 3, 'Carbo Veg 30c, Cuprum Metalicum 30c, Mercurius Sol um 30c',                 12, 'Fracture of glenoid cavity of scapula', 12),
(13, 2, 3, 'Baptisia tinctoria, Echinacea (angustifolia), Phytolaccrrum phosphoricum',  13, 'Non-pressure chronic ulcer of unspecified calf', 13),
(14, 2, 4, 'Doxycycline',                                                               14, 'Endomyocardial (eosinophilic) disease', 14),
(15, 3, 4, 'metronidazole',                                                             15, 'Assault by oth gas, air or spring-operated gun, init encntr', 15),
(16, 4, 5, 'acetaminophen, dextromethorphan hydrobromide liquid',                       16, 'Open wound of right buttock', 16),
(17, 5, 2, 'Bacitracin Zinc',                                                           17, 'Unspecified alveolar anomaly', 17),
(18, 1, 5, 'Promethazine Hydrochloride',                                                18, 'Corrosion of unsp deg mult sites of right ank/ft, init', 18),
(19, 5, 2, 'Bisacodyl',                                                                 19, 'Poisoning by other general anesthetics, assault, init encntr', 19),
(20, 2, 3, 'Simethicone',                                                               20, 'Other drug-induced agranulocytosis', 20),
(21, 3, 4, 'Cisplatin',                                                                 21, 'Path fx in oth disease, r fibula, subs for fx w delay heal', 21),
(22, 5, 2, 'Oxygen',                                                                    22, 'Unsp inj flexor musc/fasc/tend r mid fngr at forarm lv, sqla', 22),
(23, 4, 1, 'Geotrichum candidum',                                                       23, 'Sltr-haris Type II physeal fx phalanx of right toe, init', 23),
(24, 3, 1, 'Ceftriaxone Sodium',                                                        24, 'Assault by knife', 24),
(25, 1, 4, 'Groundsel',                                                                 25, 'Selective deficiency of immunoglobulin A [IgA]', 25),
(26, 1, 2, 'Aspirin',                                                                   26, 'Burn of third degree of right axilla, sequela', 26),
(27, 1, 5,'Ranitidine',                                                                 27, 'Injury of unsp nerve at hip and thi lev, unsp leg, sequela', 27),
(28, 1, 2,'BENZALKONIUM CHLORIDE, BACITRACIN ZINC,',                                    28, '3-methylglutaconic aciduria', 28),
(29, 1, 3, 'isotretinoin',                                                              29, 'Burn third deg of unsp site unsp lower limb, ex ank/ft, sqla', 29),
(30, 5, 5,'IBUPROFEN AND DIPHENHYDRAMINE HCL',                                          30, 'Disp fx of posterior wall of right acetab, init for opn fx', 30),
(31, 5, 1,'Octreotide acetate',                                                         31, 'Drown due to passenger ship overturning, sequela', 31),
(32, 4, 2, 'tramadol hydrochloride',                                                    32, 'Osteonecrosis in diseases classified elsewhere, upper arm', 32),
(33, 2, 3, 'Avobenzone, Homosalate, Octisalate, Octocrylene, and Oxybenzone',           33, 'Inconclusive mammogram', 33),
(34, 2, 2, 'EPICOCCUM NIGRUM',                                                          34, 'Nondisplaced fracture of neck of unspecified radius, sequela', 34),
(35, 3, 5, 'SULFUR',                                                                    35, 'Maternal care for oth rhesus isoimmun, second tri, unsp', 35),
(36, 4, 5, 'California Mugwort',                                                        36, 'External constriction of unspecified shoulder, sequela', 36),
(37, 4, 5, 'methimazole',                                                               37, 'Loose body in knee, right knee', 37),
(38, 5, 1, 'Adrenalinuhosphoricum, Kali phosphoricum, Paullinia sinensis',              38, 'Displ commnt fx l patella, 7thF', 38),
(39, 2, 3, 'Hydrocortisone',                                                            39, 'Disp fx of cuboid bone of left foot, init for opn fx', 39),
(40, 5, 2, 'AVOBENZONE, OCTOCRYLENE, OXYBENZONE',                                       40, 'Pressure ulcer of unspecified hip, stage 3', 40),
(41, 1, 5, 'Meperidine Hydrochloride',                                                  41, 'Unspecified sprain of left wrist, initial encounter', 41),
(42, 4, 2, 'BARIUM CATION',                                                             42, 'Path fx in oth disease, r radius, subs for fx w malunion', 42),
(43, 4, 1, 'OCTINOXATE, TITANIUM DIOXIDE, and ZINC OXIDE',                              43, 'Displaced unsp condyle fx lower end of unsp femur, init', 43),
(44, 3, 1, 'Bupropion Hydrochloride',                                                   44, 'Nondisp spiral fx shaft of ulna, unsp arm, 7thB', 44),
(45, 5, 3, 'Glimepiride',                                                               45, 'Displ transverse fx shaft of l ulna, 7thN', 45),
(46, 3, 5, 'Doxylamine succinate',                                                      46, 'Nondisp commnt fx shaft of unsp tibia, 7thC', 46),
(47, 3, 2, 'CIPROFLOXACIN',                                                             47, 'Major osseous defect, shoulder region', 47),
(48, 1, 4, 'TITANIUM DIOXIDE, OCTINOXATE',                                              48, 'Malignant neoplasm of duodenum', 48),
(49, 1, 1, 'OCTINOXATE, AVOBENZONE',                                                    49, 'Osteitis condensans, thigh', 49),
(50, 1, 1, 'BISMUTH SUBSALICYLATE',                                                     50, 'Unsp cervical disc disorder, mid-cervical region, unsp level', 50);

INSERT INTO Image(ImgId, ImgNom, ProId)
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
(1, 'Montague',     'Maisie',       '16th Floor',   'Bahe',             'China',        '80000',        '1996-09-22', false),
(2, 'Lynda',        'Erskine',      'Suite 42',     'Padre Paraíso',    'Brazil',       '39818-000',    '2014-12-12', false),
(3, 'Kit',          'Martguerita',  'Apt 1458',     'Compostela',       'Philippines',  '8109',         '2021-04-30', true),
(4, 'Laurene',      'Maude',        'Apt 131',      'Lazaro Cardenas',  'Mexico',       '92933',        '2001-10-16', false),
(5, 'Ellery',       'Tore',         'Room 675',     'Shuishi',          'China',        '50000',        '2013-05-14', true);

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