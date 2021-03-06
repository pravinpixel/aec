{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<?php

// {
// 	"name": "Jaguars",
// 	"trade": "Concrete",
// 	"address_line_1": "The Fifth Avenue",
// 	"address_line_2": "#303",
// 	"city": "New York",
// 	"postal_code": "10011",
// 	"state_or_province": "New York",
// 	"country": "United States",
// 	"phone": "(634)329-2353",
// 	"website_url": "http://www.autodesk.com"
// 	"description":"Jaguars is the world\"s largest concrete company."
// 	"erp_id":"c79bf096-5a3e-41a4-aaf8-a771ed329047",
// 	"tax_id":"413-07-5767"
//   }

$trade = array(
	"Architecture",
	"Communications",
	"Communications | Data",
	"Concrete",
	"Concrete | Cast-in-Place",
	"Concrete | Precast",
	"Construction Management",
	"Conveying Equipment",
	"Conveying Equipment | Elevators",
	"Demolition",
	"Earthwork",
	"Earthwork | Site Excavation & Grading",
	"Electrical",
	"Electrical Power Generation",
	"Electronic Safety & Security",
	"Equipment",
	"Equipment | Kitchen Appliances",
	"Exterior Improvements",
	"Exterior | Fences & Gates",
	"Exterior | Landscaping",
	"Exterior | Irrigation",
	"Finishes",
	"Finishes | Carpeting",
	"Finishes | Ceiling",
	"Finishes | Drywall",
	"Finishes | Flooring",
	"Finishes | Painting & Coating",
	"Finishes | Tile",
	"Fire Suppression",
	"Furnishings",
	"Furnishings | Casework & Cabinets",
	"Furnishings | Countertops",
	"Furnishings | Window Treatments",
	"General Contractor",
	"HVAC Heating, Ventilating, & Air Conditioning",
	"Industry-Specific Manufacturing Processing",
	"Integrated Automation",
	"Masonry",
	"Material Processing & Handling Equipment",
	"Metals",
	"Metals | Structural Steel / Framing",
	"Moisture Protection",
	"Moisture Protection | Roofing",
	"Moisture Protection | Waterproofing",
	"Openings",
	"Openings | Doors & Frames",
	"Openings | Entrances & Storefronts",
	"Openings | Glazing",
	"Openings | Roof Windows & Skylights",
	"Openings | Windows",
	"Owner",
	"Plumbing",
	"Pollution & Waste Control Equipment",
	"Process Gas & Liquid Handling, Purification, & Storage Equipment",
	"Process Heating, Cooling, & Drying Equipment",
	"Process Integration",
	"Process Integration | Piping",
	"Special Construction",
	"Specialties",
	"Specialties | Signage",
	"Utilities",
	"Water & Wastewater Equipment",
	"Waterway & Marine Construction",
	"Wood & Plastics",
	"Wood & Plastics | Millwork",
	"Wood & Plastics | Rough Carpentry"
);

$countries = array(
	"Afghanistan",
	"??land??Islands",
	"Albania",
	"Algeria",
	"American??Samoa",
	"Andorra",
	"Angola",
	"Anguilla",
	"Antarctica",
	"Antigua??and??Barbuda",
	"Argentina",
	"Armenia",
	"Aruba",
	"Australia",
	"Austria",
	"Azerbaijan",
	"Bahamas",
	"Bahrain",
	"Bangladesh",
	"Barbados",
	"Belarus",
	"Belgium",
	"Belize",
	"Benin",
	"Bermuda",
	"Bhutan",
	"Bolivia,??Plurinational??State??of",
	"Bonaire,??Sint??Eustatius??and??Saba",
	"Bosnia??and??Herzegovina",
	"Botswana",
	"Bouvet??Island",
	"Brazil",
	"British??Indian??Ocean??Territory",
	"Brunei??Darussalam",
	"Bulgaria",
	"Burkina??Faso",
	"Burundi",
	"Cabo??Verde",
	"Cambodia",
	"Cameroon",
	"Canada",
	"Cayman??Islands",
	"Central??African??Republic",
	"Chad",
	"Chile",
	"China",
	"Christmas??Island",
	"Cocos??(Keeling)??Islands",
	"Colombia",
	"Comoros",
	"Congo",
	"Congo,??The??Democratic??Republic??of??the",
	"Cook??Islands",
	"Costa??Rica",
	"C??te??d'Ivoire",
	"Croatia",
	"Cuba",
	"Cura??ao",
	"Cyprus",
	"Czechia",
	"Denmark",
	"Djibouti",
	"Dominica",
	"Dominican??Republic",
	"Ecuador",
	"Egypt",
	"El??Salvador",
	"Equatorial??Guinea",
	"Eritrea",
	"Estonia",
	"Ethiopia",
	"Falkland??Islands??(Malvinas)",
	"Faroe??Islands",
	"Fiji",
	"Finland",
	"France",
	"French??Guiana",
	"French??Polynesia",
	"French??Southern??Territories",
	"Gabon",
	"Gambia",
	"Georgia",
	"Germany",
	"Ghana",
	"Gibraltar",
	"Greece",
	"Greenland",
	"Grenada",
	"Guadeloupe",
	"Guam",
	"Guatemala",
	"Guernsey",
	"Guinea",
	"Guinea-Bissau",
	"Guyana",
	"Haiti",
	"Heard??Island??and??McDonald??Islands",
	"Holy??See??(Vatican??City??State)",
	"Honduras",
	"Hong??Kong",
	"Hungary",
	"Iceland",
	"India",
	"Indonesia",
	"Iran,??Islamic??Republic??of",
	"Iraq",
	"Ireland",
	"Isle??of??Man",
	"Israel",
	"Italy",
	"Jamaica",
	"Japan",
	"Jersey",
	"Jordan",
	"Kazakhstan",
	"Kenya",
	"Kiribati",
	"Korea,??Democratic??People's??Republic??of",
	"Korea,??Republic??of",
	"Kuwait",
	"Kyrgyzstan",
	"Lao??People's??Democratic??Republic",
	"Latvia",
	"Lebanon",
	"Lesotho",
	"Liberia",
	"Libya",
	"Liechtenstein",
	"Lithuania",
	"Luxembourg",
	"Macao",
	"Madagascar",
	"Malawi",
	"Malaysia",
	"Maldives",
	"Mali",
	"Malta",
	"Marshall??Islands",
	"Martinique",
	"Mauritania",
	"Mauritius",
	"Mayotte",
	"Mexico",
	"Micronesia,??Federated??States??of",
	"Moldova,??Republic??of",
	"Monaco",
	"Mongolia",
	"Montenegro",
	"Montserrat",
	"Morocco",
	"Mozambique",
	"Myanmar",
	"Namibia",
	"Nauru",
	"Nepal",
	"Netherlands",
	"New??Caledonia",
	"New??Zealand",
	"Nicaragua",
	"Niger",
	"Nigeria",
	"Niue",
	"Norfolk??Island",
	"North??Macedonia",
	"Northern??Mariana??Islands",
	"Norway",
	"Oman",
	"Pakistan",
	"Palau",
	"Palestine,??State??of",
	"Panama",
	"Papua??New??Guinea",
	"Paraguay",
	"Peru",
	"Philippines",
	"Pitcairn",
	"Poland",
	"Portugal",
	"Puerto??Rico",
	"Qatar",
	"R??union",
	"Romania",
	"Russia",
	"Rwanda",
	"Saint??Barth??lemy",
	"Saint??Helena,??Ascension??and??Tristan??da??Cunha",
	"Saint??Kitts??and??Nevis",
	"Saint??Lucia",
	"Saint??Martin??(French??part)",
	"Saint??Pierre??and??Miquelon",
	"Saint??Vincent??and??the??Grenadines",
	"Samoa",
	"San??Marino",
	"Sao??Tome??and??Principe",
	"Saudi??Arabia",
	"Senegal",
	"Serbia",
	"Seychelles",
	"Sierra??Leone",
	"Singapore",
	"Sint??Maarten??(Dutch??part)",
	"Slovakia",
	"Slovenia",
	"Solomon??Islands",
	"Somalia",
	"South??Africa",
	"South??Georgia??and??the??South??Sandwich??Islands",
	"South??Sudan",
	"Spain",
	"Sri??Lanka",
	"Sudan",
	"Suriname",
	"Svalbard??and??Jan??Mayen",
	"Swaziland",
	"Sweden",
	"Switzerland",
	"Syrian??Arab??Republic",
	"Taiwan",
	"Tajikistan",
	"Tanzania,??United??Republic??of",
	"Thailand",
	"Timor-Leste",
	"Togo",
	"Tokelau",
	"Tonga",
	"Trinidad??and??Tobago",
	"Tunisia",
	"Turkey",
	"Turkmenistan",
	"Turks??and??Caicos??Islands",
	"Tuvalu",
	"Uganda",
	"Ukraine",
	"United??Arab??Emirates",
	"United??Kingdom",
	"United??States",
	"United??States??Minor??Outlying??Islands",
	"Uruguay",
	"Uzbekistan",
	"Vanuatu",
	"Venezuela,??Bolivarian??Republic??of",
	"Vietnam",
	"Virgin??Islands,??British",
	"Virgin??Islands,??U.S.",
	"Wallis??and??Futuna",
	"Western??Sahara",
	"Yemen",
	"Zambia",
	"Zimbabwe"
);

?>

<script>
	var countrywisestatelist = [{
			"country": "Andorra",
			"states": [
				"Canillo",
				"Encamp",
				"La Massana",
				"Ordino",
				"Sant Juli?? de L??ria",
				"Andorra la Vella",
				"Escaldes-Engordany"
			]
		},
		{
			"country": "United Arab Emirates",
			"states": [
				"'Ajm??n",
				"Ab?? ??aby [Abu Dhabi]",
				"Dubayy",
				"Al Fujayrah",
				"Ra???s al Khaymah",
				"Ash Sh??riqah",
				"Umm al Qaywayn"
			]
		},
		{
			"country": "Afghanistan",
			"states": [
				"Balkh",
				"B??my??n",
				"B??dgh??s",
				"Badakhsh??n",
				"Baghl??n",
				"D??ykund??",
				"Far??h",
				"F??ry??b",
				"Ghazn??",
				"Gh??r",
				"Helmand",
				"Her??t",
				"Jowzj??n",
				"K??bul",
				"Kandah??r",
				"K??p??s??",
				"Kunduz",
				"Kh??st",
				"Kunar",
				"Laghm??n",
				"L??gar",
				"Nangarh??r",
				"N??mr??z",
				"N??rist??n",
				"Panjshayr",
				"Parw??n",
				"Paktiy??",
				"Pakt??k??",
				"Samang??n",
				"Sar-e Pul",
				"Takh??r",
				"Uruzg??n",
				"Wardak",
				"Z??bul"
			]
		},
		{
			"country": "Antigua and Barbuda",
			"states": [
				"Saint George",
				"Saint John",
				"Saint Mary",
				"Saint Paul",
				"Saint Peter",
				"Saint Philip",
				"Barbuda",
				"Redonda"
			]
		},
		{
			"country": "Anguilla",
			"states": []
		},
		{
			"country": "Albania",
			"states": [
				"Berat",
				"Durr??s",
				"Elbasan",
				"Fier",
				"Gjirokast??r",
				"Kor????",
				"Kuk??s",
				"Lezh??",
				"Dib??r",
				"Shkod??r",
				"Tiran??",
				"Vlor??"
			]
		},
		{
			"country": "Armenia",
			"states": [
				"Aragacotn",
				"Ararat",
				"Armavir",
				"Erevan",
				"Gegarkunik'",
				"Kotayk'",
				"Lory",
				"Sirak",
				"Syunik'",
				"Tavus",
				"Vayoc Jor"
			]
		},
		{
			"country": "Angola",
			"states": [
				"Bengo",
				"Benguela",
				"Bi??",
				"Cabinda",
				"Cuando-Cubango",
				"Cunene",
				"Cuanza Norte",
				"Cuanza Sul",
				"Huambo",
				"Hu??la",
				"Lunda Norte",
				"Lunda Sul",
				"Luanda",
				"Malange",
				"Moxico",
				"Namibe",
				"U??ge",
				"Zaire"
			]
		},
		{
			"country": "Antarctica",
			"states": []
		},
		{
			"country": "Argentina",
			"states": [
				"Salta",
				"Buenos Aires",
				"Ciudad Aut??noma de Buenos Aires",
				"San Luis",
				"Entre Rios",
				"Santiago del Estero",
				"Chaco",
				"San Juan",
				"Catamarca",
				"La Pampa",
				"Mendoza",
				"Misiones",
				"Formosa",
				"Neuquen",
				"Rio Negro",
				"Santa Fe",
				"Tucuman",
				"Chubut",
				"Tierra del Fuego",
				"Corrientes",
				"Cordoba",
				"Jujuy",
				"Santa Cruz",
				"La Rioja"
			]
		},
		{
			"country": "American Samoa",
			"states": []
		},
		{
			"country": "Austria",
			"states": [
				"Burgenland",
				"K??rnten",
				"Nieder??sterreich",
				"Ober??sterreich",
				"Salzburg",
				"Steiermark",
				"Tirol",
				"Vorarlberg",
				"Wien"
			]
		},
		{
			"country": "Australia",
			"states": [
				"Australian Capital Territory",
				"New South Wales",
				"Northern Territory",
				"Queensland",
				"South Australia",
				"Tasmania",
				"Victoria",
				"Western Australia"
			]
		},
		{
			"country": "Aruba",
			"states": []
		},
		{
			"country": "??land Islands",
			"states": []
		},
		{
			"country": "Azerbaijan",
			"states": [
				"Ab??eron",
				"A??stafa",
				"A??cab??di",
				"A??dam",
				"A??da??",
				"A??su",
				"Astara",
				"Bak??",
				"Balak??n",
				"B??rd??",
				"Beyl??qan",
				"Bil??suvar",
				"C??bray??l",
				"C??lilabab",
				"Da??k??s??n",
				"F??zuli",
				"G??nc??",
				"G??d??b??y",
				"Goranboy",
				"G??y??ay",
				"G??yg??l",
				"Hac??qabul",
				"??mi??li",
				"??smay??ll??",
				"K??lb??c??r",
				"K??rd??mir",
				"L??nk??ran",
				"La????n",
				"L??nk??ran",
				"Lerik",
				"Masall??",
				"Ming????evir",
				"Naftalan",
				"Neft??ala",
				"Nax????van",
				"O??uz",
				"Q??b??l??",
				"Qax",
				"Qazax",
				"Quba",
				"Qubadl??",
				"Qobustan",
				"Qusar",
				"????ki",
				"Sabirabad",
				"????ki",
				"Salyan",
				"Saatl??",
				"??abran",
				"Siy??z??n",
				"????mkir",
				"Sumqay??t",
				"??amax??",
				"Samux",
				"??irvan",
				"??u??a",
				"T??rt??r",
				"Tovuz",
				"Ucar",
				"Xank??ndi",
				"Xa??maz",
				"Xocal??",
				"X??z??",
				"Xocav??nd",
				"Yard??ml??",
				"Yevlax",
				"Yevlax",
				"Z??ngilan",
				"Zaqatala",
				"Z??rdab"
			]
		},
		{
			"country": "Bosnia and Herzegovina",
			"states": [
				"Federacija Bosne i Hercegovine",
				"Br??ko distrikt",
				"Republika Srpska"
			]
		},
		{
			"country": "Barbados",
			"states": [
				"Christ Church",
				"Saint Andrew",
				"Saint George",
				"Saint James",
				"Saint John",
				"Saint Joseph",
				"Saint Lucy",
				"Saint Michael",
				"Saint Peter",
				"Saint Philip",
				"Saint Thomas"
			]
		},
		{
			"country": "Bangladesh",
			"states": [
				"Barisal",
				"Chittagong",
				"Dhaka",
				"Khulna",
				"Rajshahi",
				"Rangpur",
				"Sylhet"
			]
		},
		{
			"country": "Belgium",
			"states": [
				"Bruxelles-Capitale, R??gion de;Brussels Hoofdstedelijk Gewest",
				"Vlaams Gewest",
				"wallonne, R??gion"
			]
		},
		{
			"country": "Burkina Faso",
			"states": [
				"Boucle du Mouhoun",
				"Cascades",
				"Centre",
				"Centre-Est",
				"Centre-Nord",
				"Centre-Ouest",
				"Centre-Sud",
				"Est",
				"Hauts-Bassins",
				"Nord",
				"Plateau-Central",
				"Sahel",
				"Sud-Ouest"
			]
		},
		{
			"country": "Bulgaria",
			"states": [
				"Blagoevgrad",
				"Burgas",
				"Varna",
				"Veliko Tarnovo",
				"Vidin",
				"Vratsa",
				"Gabrovo",
				"Dobrich",
				"Kardzhali",
				"Kyustendil",
				"Lovech",
				"Montana",
				"Pazardzhik",
				"Pernik",
				"Pleven",
				"Plovdiv",
				"Razgrad",
				"Ruse",
				"Silistra",
				"Sliven",
				"Smolyan",
				"Sofia-Grad",
				"Sofia",
				"Stara Zagora",
				"Targovishte",
				"Haskovo",
				"Shumen",
				"Yambol"
			]
		},
		{
			"country": "Bahrain",
			"states": [
				"Al Man??mah (Al ???????imah)",
				"Al Jan??b??yah",
				"Al Mu???arraq",
				"Al Wus????",
				"Ash Sham??l??yah"
			]
		},
		{
			"country": "Burundi",
			"states": [
				"Bubanza",
				"Bujumbura Rural",
				"Bujumbura Mairie",
				"Bururi",
				"Cankuzo",
				"Cibitoke",
				"Gitega",
				"Kirundo",
				"Karuzi",
				"Kayanza",
				"Makamba",
				"Muramvya",
				"Mwaro",
				"Ngozi",
				"Rutana",
				"Ruyigi"
			]
		},
		{
			"country": "Benin",
			"states": [
				"Atakora",
				"Alibori",
				"Atlantique",
				"Borgou",
				"Collines",
				"Donga",
				"Kouffo",
				"Littoral",
				"Mono",
				"Ou??m??",
				"Plateau",
				"Zou"
			]
		},
		{
			"country": "Saint Barth??lemy",
			"states": []
		},
		{
			"country": "Bermuda",
			"states": []
		},
		{
			"country": "Brunei Darussalam",
			"states": [
				"Belait",
				"Brunei-Muara",
				"Temburong",
				"Tutong"
			]
		},
		{
			"country": "Bolivia, Plurinational State of",
			"states": [
				"El Beni",
				"Cochabamba",
				"Chuquisaca",
				"La Paz",
				"Pando",
				"Oruro",
				"Potos??",
				"Santa Cruz",
				"Tarija"
			]
		},
		{
			"country": "Bonaire, Sint Eustatius and Saba",
			"states": [
				"Bonaire",
				"Saba",
				"Sint Eustatius"
			]
		},
		{
			"country": "Brazil",
			"states": [
				"Acre",
				"Alagoas",
				"Amazonas",
				"Amap??",
				"Bahia",
				"Cear??",
				"Distrito Federal",
				"Esp??rito Santo",
				"Fernando de Noronha",
				"Goi??s",
				"Maranh??o",
				"Minas Gerais",
				"Mato Grosso do Sul",
				"Mato Grosso",
				"Par??",
				"Para??ba",
				"Pernambuco",
				"Piau??",
				"Paran??",
				"Rio de Janeiro",
				"Rio Grande do Norte",
				"Rond??nia",
				"Roraima",
				"Rio Grande do Sul",
				"Santa Catarina",
				"Sergipe",
				"S??o Paulo",
				"Tocantins"
			]
		},
		{
			"country": "Bahamas",
			"states": [
				"Acklins",
				"Bimini",
				"Black Point",
				"Berry Islands",
				"Central Eleuthera",
				"Cat Island",
				"Crooked Island and Long Cay",
				"Central Abaco",
				"Central Andros",
				"East Grand Bahama",
				"Exuma",
				"City of Freeport",
				"Grand Cay",
				"Harbour Island",
				"Hope Town",
				"Inagua",
				"Long Island",
				"Mangrove Cay",
				"Mayaguana",
				"Moore's Island",
				"North Eleuthera",
				"North Abaco",
				"North Andros",
				"Rum Cay",
				"Ragged Island",
				"South Andros",
				"South Eleuthera",
				"South Abaco",
				"San Salvador",
				"Spanish Wells",
				"West Grand Bahama"
			]
		},
		{
			"country": "Bhutan",
			"states": [
				"Paro",
				"Chhukha",
				"Ha",
				"Samtee",
				"Thimphu",
				"Tsirang",
				"Dagana",
				"Punakha",
				"Wangdue Phodrang",
				"Sarpang",
				"Trongsa",
				"Bumthang",
				"Zhemgang",
				"Trashigang",
				"Monggar",
				"Pemagatshel",
				"Lhuentse",
				"Samdrup Jongkha",
				"Gasa",
				"Trashi Yangtse"
			]
		},
		{
			"country": "Bouvet Island",
			"states": []
		},
		{
			"country": "Botswana",
			"states": [
				"Central",
				"Ghanzi",
				"Kgalagadi",
				"Kgatleng",
				"Kweneng",
				"North-East",
				"North-West",
				"South-East",
				"Southern"
			]
		},
		{
			"country": "Belarus",
			"states": [
				"Br??sckaja voblasc'",
				"Horad Minsk",
				"Homel'skaja voblasc'",
				"Hrodzenskaja voblasc'",
				"Mahil??uskaja voblasc'",
				"Minskaja voblasc'",
				"Vicebskaja voblasc'"
			]
		},
		{
			"country": "Belize",
			"states": [
				"Belize",
				"Cayo",
				"Corozal",
				"Orange Walk",
				"Stann Creek",
				"Toledo"
			]
		},
		{
			"country": "Canada",
			"states": [
				"Alberta",
				"British Columbia",
				"Manitoba",
				"New Brunswick",
				"Newfoundland and Labrador",
				"Nova Scotia",
				"Northwest Territories",
				"Nunavut",
				"Ontario",
				"Prince Edward Island",
				"Quebec",
				"Saskatchewan",
				"Yukon Territory"
			]
		},
		{
			"country": "Cocos (Keeling) Islands",
			"states": []
		},
		{
			"country": "Congo, The Democratic Republic of the",
			"states": [
				"Bas-Congo",
				"Bandundu",
				"??quateur",
				"Katanga",
				"Kasai-Oriental",
				"Kinshasa",
				"Kasai-Occidental",
				"Maniema",
				"Nord-Kivu",
				"Orientale",
				"Sud-Kivu"
			]
		},
		{
			"country": "Central African Republic",
			"states": [
				"Ouham",
				"Bamingui-Bangoran",
				"Bangui",
				"Basse-Kotto",
				"Haute-Kotto",
				"Haut-Mbomou",
				"Haute-Sangha / Mamb??r??-Kad????",
				"Gribingui",
				"K??mo-Gribingui",
				"Lobaye",
				"Mbomou",
				"Ombella-M'poko",
				"Nana-Mamb??r??",
				"Ouham-Pend??",
				"Sangha",
				"Ouaka",
				"Vakaga"
			]
		},
		{
			"country": "Congo",
			"states": [
				"Bouenza",
				"Pool",
				"Sangha",
				"Plateaux",
				"Cuvette-Ouest",
				"L??koumou",
				"Kouilou",
				"Likouala",
				"Cuvette",
				"Niari",
				"Brazzaville"
			]
		},
		{
			"country": "Switzerland",
			"states": [
				"Aargau",
				"Appenzell Innerrhoden",
				"Appenzell Ausserrhoden",
				"Bern",
				"Basel-Landschaft",
				"Basel-Stadt",
				"Fribourg",
				"Gen??ve",
				"Glarus",
				"Graub??nden",
				"Jura",
				"Luzern",
				"Neuch??tel",
				"Nidwalden",
				"Obwalden",
				"Sankt Gallen",
				"Schaffhausen",
				"Solothurn",
				"Schwyz",
				"Thurgau",
				"Ticino",
				"Uri",
				"Vaud",
				"Valais",
				"Zug",
				"Z??rich"
			]
		},
		{
			"country": "C??te d'Ivoire",
			"states": [
				"Lagunes (R??gion des)",
				"Haut-Sassandra (R??gion du)",
				"Savanes (R??gion des)",
				"Vall??e du Bandama (R??gion de la)",
				"Moyen-Como?? (R??gion du)",
				"18 Montagnes (R??gion des)",
				"Lacs (R??gion des)",
				"Zanzan (R??gion du)",
				"Bas-Sassandra (R??gion du)",
				"Dengu??l?? (R??gion du)",
				"Nzi-Como?? (R??gion)",
				"Marahou?? (R??gion de la)",
				"Sud-Como?? (R??gion du)",
				"Worodouqou (R??gion du)",
				"Sud-Bandama (R??gion du)",
				"Agn??bi (R??gion de l')",
				"Bafing (R??gion du)",
				"Fromager (R??gion du)",
				"Moyen-Cavally (R??gion du)"
			]
		},
		{
			"country": "Cook Islands",
			"states": []
		},
		{
			"country": "Chile",
			"states": [
				"Ais??n del General Carlos Ib????ez del Campo",
				"Antofagasta",
				"Arica y Parinacota",
				"Araucan??a",
				"Atacama",
				"B??o-B??o",
				"Coquimbo",
				"Libertador General Bernardo O'Higgins",
				"Los Lagos",
				"Los R??os",
				"Magallanes y Ant??rtica Chilena",
				"Maule",
				"Regi??n Metropolitana de Santiago",
				"Tarapac??",
				"Valpara??so"
			]
		},
		{
			"country": "Cameroon",
			"states": [
				"Adamaoua",
				"Centre",
				"Far North",
				"East",
				"Littoral",
				"North",
				"North-West (Cameroon)",
				"West",
				"South",
				"South-West"
			]
		},
		{
			"country": "China",
			"states": [
				"Beijing",
				"Tianjin",
				"Hebei",
				"Shanxi",
				"Nei Mongol",
				"Liaoning",
				"Jilin",
				"Heilongjiang",
				"Shanghai",
				"Jiangsu",
				"Zhejiang",
				"Anhui",
				"Fujian",
				"Jiangxi",
				"Shandong",
				"Henan",
				"Hubei",
				"Hunan",
				"Guangdong",
				"Guangxi",
				"Hainan",
				"Chongqing",
				"Sichuan",
				"Guizhou",
				"Yunnan",
				"Xizang",
				"Shaanxi",
				"Gansu",
				"Qinghai",
				"Ningxia",
				"Xinjiang",
				"Taiwan",
				"Xianggang (Hong-Kong)",
				"Aomen (Macau)"
			]
		},
		{
			"country": "Colombia",
			"states": [
				"Amazonas",
				"Antioquia",
				"Arauca",
				"Atl??ntico",
				"Bol??var",
				"Boyac??",
				"Caldas",
				"Caquet??",
				"Casanare",
				"Cauca",
				"Cesar",
				"Choc??",
				"C??rdoba",
				"Cundinamarca",
				"Distrito Capital de Bogot??",
				"Guain??a",
				"Guaviare",
				"Huila",
				"La Guajira",
				"Magdalena",
				"Meta",
				"Nari??o",
				"Norte de Santander",
				"Putumayo",
				"Quind??o",
				"Risaralda",
				"Santander",
				"San Andr??s, Providencia y Santa Catalina",
				"Sucre",
				"Tolima",
				"Valle del Cauca",
				"Vaup??s",
				"Vichada"
			]
		},
		{
			"country": "Costa Rica",
			"states": [
				"Alajuela",
				"Cartago",
				"Guanacaste",
				"Heredia",
				"Lim??n",
				"Puntarenas",
				"San Jos??"
			]
		},
		{
			"country": "Cuba",
			"states": [
				"Pinar del Rio",
				"La Habana",
				"Ciudad de La Habana",
				"Matanzas",
				"Villa Clara",
				"Cienfuegos",
				"Sancti Sp??ritus",
				"Ciego de ??vila",
				"Camag??ey",
				"Las Tunas",
				"Holgu??n",
				"Granma",
				"Santiago de Cuba",
				"Guant??namo",
				"Isla de la Juventud"
			]
		},
		{
			"country": "Cape Verde",
			"states": [
				"Ilhas de Barlavento",
				"Ilhas de Sotavento"
			]
		},
		{
			"country": "Cura??ao",
			"states": []
		},
		{
			"country": "Christmas Island",
			"states": []
		},
		{
			"country": "Cyprus",
			"states": [
				"Lefkos??a",
				"Lemes??s",
				"L??rnaka",
				"Amm??chostos",
				"P??fos",
				"Ker??neia"
			]
		},
		{
			"country": "Czech Republic",
			"states": [
				"Jiho??esk?? kraj",
				"Jihomoravsk?? kraj",
				"Karlovarsk?? kraj",
				"Kr??lov??hradeck?? kraj",
				"Libereck?? kraj",
				"Moravskoslezsk?? kraj",
				"Olomouck?? kraj",
				"Pardubick?? kraj",
				"Plze??sk?? kraj",
				"Praha, hlavn?? m??sto",
				"St??edo??esk?? kraj",
				"??steck?? kraj",
				"Vyso??ina",
				"Zl??nsk?? kraj"
			]
		},
		{
			"country": "Germany",
			"states": [
				"Brandenburg",
				"Berlin",
				"Baden-W??rttemberg",
				"Bayern",
				"Bremen",
				"Hessen",
				"Hamburg",
				"Mecklenburg-Vorpommern",
				"Niedersachsen",
				"Nordrhein-Westfalen",
				"Rheinland-Pfalz",
				"Schleswig-Holstein",
				"Saarland",
				"Sachsen",
				"Sachsen-Anhalt",
				"Th??ringen"
			]
		},
		{
			"country": "Djibouti",
			"states": [
				"Arta",
				"Ali Sabieh",
				"Dikhil",
				"Djibouti",
				"Obock",
				"Tadjourah"
			]
		},
		{
			"country": "Denmark",
			"states": [
				"Nordjylland",
				"Midtjylland",
				"Syddanmark",
				"Hovedstaden",
				"Sj??lland"
			]
		},
		{
			"country": "Dominica",
			"states": [
				"Saint Peter",
				"Saint Andrew",
				"Saint David",
				"Saint George",
				"Saint John",
				"Saint Joseph",
				"Saint Luke",
				"Saint Mark",
				"Saint Patrick",
				"Saint Paul"
			]
		},
		{
			"country": "Dominican Republic",
			"states": [
				"Distrito Nacional (Santo Domingo)",
				"Azua",
				"Bahoruco",
				"Barahona",
				"Dajab??n",
				"Duarte",
				"La Estrelleta [El??as Pi??a]",
				"El Seybo [El Seibo]",
				"Espaillat",
				"Independencia",
				"La Altagracia",
				"La Romana",
				"La Vega",
				"Mar??a Trinidad S??nchez",
				"Monte Cristi",
				"Pedernales",
				"Peravia",
				"Puerto Plata",
				"Salcedo",
				"Saman??",
				"San Crist??bal",
				"San Juan",
				"San Pedro de Macor??s",
				"S??nchez Ram??rez",
				"Santiago",
				"Santiago Rodr??guez",
				"Valverde",
				"Monse??or Nouel",
				"Monte Plata",
				"Hato Mayor"
			]
		},
		{
			"country": "Algeria",
			"states": [
				"Adrar",
				"Chlef",
				"Laghouat",
				"Oum el Bouaghi",
				"Batna",
				"B??ja??a",
				"Biskra",
				"B??char",
				"Blida",
				"Bouira",
				"Tamanghasset",
				"T??bessa",
				"Tlemcen",
				"Tiaret",
				"Tizi Ouzou",
				"Alger",
				"Djelfa",
				"Jijel",
				"S??tif",
				"Sa??da",
				"Skikda",
				"Sidi Bel Abb??s",
				"Annaba",
				"Guelma",
				"Constantine",
				"M??d??a",
				"Mostaganem",
				"Msila",
				"Mascara",
				"Ouargla",
				"Oran",
				"El Bayadh",
				"Illizi",
				"Bordj Bou Arr??ridj",
				"Boumerd??s",
				"El Tarf",
				"Tindouf",
				"Tissemsilt",
				"El Oued",
				"Khenchela",
				"Souk Ahras",
				"Tipaza",
				"Mila",
				"A??n Defla",
				"Naama",
				"A??n T??mouchent",
				"Gharda??a",
				"Relizane"
			]
		},
		{
			"country": "Ecuador",
			"states": [
				"Azuay",
				"Bol??var",
				"Carchi",
				"Orellana",
				"Esmeraldas",
				"Ca??ar",
				"Guayas",
				"Chimborazo",
				"Imbabura",
				"Loja",
				"Manab??",
				"Napo",
				"El Oro",
				"Pichincha",
				"Los R??os",
				"Morona-Santiago",
				"Santo Domingo de los Ts??chilas",
				"Santa Elena",
				"Tungurahua",
				"Sucumb??os",
				"Gal??pagos",
				"Cotopaxi",
				"Pastaza",
				"Zamora-Chinchipe"
			]
		},
		{
			"country": "Estonia",
			"states": [
				"Harjumaa",
				"Hiiumaa",
				"Ida-Virumaa",
				"J??gevamaa",
				"J??rvamaa",
				"L????nemaa",
				"L????ne-Virumaa",
				"P??lvamaa",
				"P??rnumaa",
				"Raplamaa",
				"Saaremaa",
				"Tartumaa",
				"Valgamaa",
				"Viljandimaa",
				"V??rumaa"
			]
		},
		{
			"country": "Egypt",
			"states": [
				"Al Iskandar??yah",
				"Asw??n",
				"Asy??t",
				"Al Bahr al Ahmar",
				"Al Buhayrah",
				"Ban?? Suwayf",
				"Al Q??hirah",
				"Ad Daqahl??yah",
				"Dumy??t",
				"Al Fayy??m",
				"Al Gharb??yah",
				"Al J??zah",
				"???ulw??n",
				"Al Ism??`??l??yah",
				"Jan??b S??n??'",
				"Al Qaly??b??yah",
				"Kafr ash Shaykh",
				"Qin??",
				"Al Miny??",
				"Al Min??f??yah",
				"Matr??h",
				"B??r Sa`??d",
				"S??h??j",
				"Ash Sharq??yah",
				"Shamal S??n??'",
				"As S??dis min Ukt??bar",
				"As Suways",
				"Al W??d?? al Jad??d"
			]
		},
		{
			"country": "Western Sahara",
			"states": []
		},
		{
			"country": "Eritrea",
			"states": [
				"Ansab??",
				"Jan??b?? al Ba???r?? al A???mar",
				"Al Jan??b??",
				"Q??sh-Barkah",
				"Al Awsa??",
				"Shim??l?? al Ba???r?? al A???mar"
			]
		},
		{
			"country": "Spain",
			"states": [
				"Andaluc??a",
				"Arag??n",
				"Asturias, Principado de",
				"Cantabria",
				"Ceuta",
				"Castilla y Le??n",
				"Castilla-La Mancha",
				"Canarias",
				"Catalunya",
				"Extremadura",
				"Galicia",
				"Illes Balears",
				"Murcia, Regi??n de",
				"Madrid, Comunidad de",
				"Melilla",
				"Navarra, Comunidad Foral de / Nafarroako Foru Komunitatea",
				"Pa??s Vasco / Euskal Herria",
				"La Rioja",
				"Valenciana, Comunidad / Valenciana, Comunitat "
			]
		},
		{
			"country": "Ethiopia",
			"states": [
				"??d??s ??beba",
				"??far",
				"??mara",
				"B??nshangul Gumuz",
				"Dir?? Dawa",
				"Gamb??la Hizboch",
				"H??rer?? Hizb",
				"Orom??ya",
				"YeDebub Bih??roch Bih??reseboch na Hizboch",
				"Sumal??",
				"Tigray"
			]
		},
		{
			"country": "Finland",
			"states": [
				"Ahvenanmaan maakunta",
				"Etel??-Karjala",
				"Etel??-Pohjanmaa",
				"Etel??-Savo",
				"Kainuu",
				"Kanta-H??me",
				"Keski-Pohjanmaa",
				"Keski-Suomi",
				"Kymenlaakso",
				"Lappi",
				"Pirkanmaa",
				"Pohjanmaa",
				"Pohjois-Karjala",
				"Pohjois-Pohjanmaa",
				"Pohjois-Savo",
				"P??ij??t-H??me",
				"Satakunta",
				"Uusimaa",
				"Varsinais-Suomi"
			]
		},
		{
			"country": "Fiji",
			"states": [
				"Central",
				"Eastern",
				"Northern",
				"Rotuma",
				"Western"
			]
		},
		{
			"country": "Falkland Islands (Malvinas)",
			"states": []
		},
		{
			"country": "Micronesia, Federated States of",
			"states": [
				"Kosrae",
				"Pohnpei",
				"Chuuk",
				"Yap"
			]
		},
		{
			"country": "Faroe Islands",
			"states": []
		},
		{
			"country": "France",
			"states": [
				"Alsace",
				"Aquitaine",
				"Saint-Barth??lemy",
				"Auvergne",
				"Clipperton",
				"Bourgogne",
				"Bretagne",
				"Centre",
				"Champagne-Ardenne",
				"Guyane",
				"Guadeloupe",
				"Corse",
				"Franche-Comt??",
				"??le-de-France",
				"Languedoc-Roussillon",
				"Limousin",
				"Lorraine",
				"Saint-Martin",
				"Martinique",
				"Midi-Pyr??n??es",
				"Nouvelle-Cal??donie",
				"Nord-Pas-de-Calais",
				"Basse-Normandie",
				"Polyn??sie fran??aise",
				"Saint-Pierre-et-Miquelon",
				"Haute-Normandie",
				"Pays de la Loire",
				"La R??union",
				"Picardie",
				"Poitou-Charentes",
				"Terres australes fran??aises",
				"Provence-Alpes-C??te d'Azur",
				"Rh??ne-Alpes",
				"Wallis-et-Futuna",
				"Mayotte"
			]
		},
		{
			"country": "Gabon",
			"states": [
				"Estuaire",
				"Haut-Ogoou??",
				"Moyen-Ogoou??",
				"Ngouni??",
				"Nyanga",
				"Ogoou??-Ivindo",
				"Ogoou??-Lolo",
				"Ogoou??-Maritime",
				"Woleu-Ntem"
			]
		},
		{
			"country": "United Kingdom",
			"states": [
				"Aberdeenshire",
				"Aberdeen City",
				"Argyll and Bute",
				"Isle of Anglesey;Sir Ynys M??n",
				"Angus",
				"Antrim",
				"Ards",
				"Armagh",
				"Bath and North East Somerset",
				"Blackburn with Darwen",
				"Bedford",
				"Barking and Dagenham",
				"Brent",
				"Bexley",
				"Belfast",
				"Bridgend;Pen-y-bont ar Ogwr",
				"Blaenau Gwent",
				"Birmingham",
				"Buckinghamshire",
				"Ballymena",
				"Ballymoney",
				"Bournemouth",
				"Banbridge",
				"Barnet",
				"Brighton and Hove",
				"Barnsley",
				"Bolton",
				"Blackpool",
				"Bracknell Forest",
				"Bradford",
				"Bromley",
				"Bristol, City of",
				"Bury",
				"Cambridgeshire",
				"Caerphilly;Caerffili",
				"Central Bedfordshire",
				"Ceredigion;Sir Ceredigion",
				"Craigavon",
				"Cheshire East",
				"Cheshire West and Chester",
				"Carrickfergus",
				"Cookstown",
				"Calderdale",
				"Clackmannanshire",
				"Coleraine",
				"Cumbria",
				"Camden",
				"Carmarthenshire;Sir Gaerfyrddin",
				"Cornwall",
				"Coventry",
				"Cardiff;Caerdydd",
				"Croydon",
				"Castlereagh",
				"Conwy",
				"Darlington",
				"Derbyshire",
				"Denbighshire;Sir Ddinbych",
				"Derby",
				"Devon",
				"Dungannon and South Tyrone",
				"Dumfries and Galloway",
				"Doncaster",
				"Dundee City",
				"Dorset",
				"Down",
				"Derry",
				"Dudley",
				"Durham, County",
				"Ealing",
				"England and Wales",
				"East Ayrshire",
				"Edinburgh, City of",
				"East Dunbartonshire",
				"East Lothian",
				"Eilean Siar",
				"Enfield",
				"England",
				"East Renfrewshire",
				"East Riding of Yorkshire",
				"Essex",
				"East Sussex",
				"Falkirk",
				"Fermanagh",
				"Fife",
				"Flintshire;Sir y Fflint",
				"Gateshead",
				"Great Britain",
				"Glasgow City",
				"Gloucestershire",
				"Greenwich",
				"Gwynedd",
				"Halton",
				"Hampshire",
				"Havering",
				"Hackney",
				"Herefordshire",
				"Hillingdon",
				"Highland",
				"Hammersmith and Fulham",
				"Hounslow",
				"Hartlepool",
				"Hertfordshire",
				"Harrow",
				"Haringey",
				"Isle of Wight",
				"Islington",
				"Inverclyde",
				"Kensington and Chelsea",
				"Kent",
				"Kingston upon Hull",
				"Kirklees",
				"Kingston upon Thames",
				"Knowsley",
				"Lancashire",
				"Lambeth",
				"Leicester",
				"Leeds",
				"Leicestershire",
				"Lewisham",
				"Lincolnshire",
				"Liverpool",
				"Limavady",
				"London, City of",
				"Larne",
				"Lisburn",
				"Luton",
				"Manchester",
				"Middlesbrough",
				"Medway",
				"Magherafelt",
				"Milton Keynes",
				"Midlothian",
				"Monmouthshire;Sir Fynwy",
				"Merton",
				"Moray",
				"Merthyr Tydfil;Merthyr Tudful",
				"Moyle",
				"North Ayrshire",
				"Northumberland",
				"North Down",
				"North East Lincolnshire",
				"Newcastle upon Tyne",
				"Norfolk",
				"Nottingham",
				"Northern Ireland",
				"North Lanarkshire",
				"North Lincolnshire",
				"North Somerset",
				"Newtownabbey",
				"Northamptonshire",
				"Neath Port Talbot;Castell-nedd Port Talbot",
				"Nottinghamshire",
				"North Tyneside",
				"Newham",
				"Newport;Casnewydd",
				"North Yorkshire",
				"Newry and Mourne",
				"Oldham",
				"Omagh",
				"Orkney Islands",
				"Oxfordshire",
				"Pembrokeshire;Sir Benfro",
				"Perth and Kinross",
				"Plymouth",
				"Poole",
				"Portsmouth",
				"Powys",
				"Peterborough",
				"Redcar and Cleveland",
				"Rochdale",
				"Rhondda, Cynon, Taff;Rhondda, Cynon,Taf",
				"Redbridge",
				"Reading",
				"Renfrewshire",
				"Richmond upon Thames",
				"Rotherham",
				"Rutland",
				"Sandwell",
				"South Ayrshire",
				"Scottish Borders, The",
				"Scotland",
				"Suffolk",
				"Sefton",
				"South Gloucestershire",
				"Sheffield",
				"St. Helens",
				"Shropshire",
				"Stockport",
				"Salford",
				"Slough",
				"South Lanarkshire",
				"Sunderland",
				"Solihull",
				"Somerset",
				"Southend-on-Sea",
				"Surrey",
				"Strabane",
				"Stoke-on-Trent",
				"Stirling",
				"Southampton",
				"Sutton",
				"Staffordshire",
				"Stockton-on-Tees",
				"South Tyneside",
				"Swansea;Abertawe",
				"Swindon",
				"Southwark",
				"Tameside",
				"Telford and Wrekin",
				"Thurrock",
				"Torbay",
				"Torfaen;Tor-faen",
				"Trafford",
				"Tower Hamlets",
				"United Kingdom",
				"Vale of Glamorgan, The;Bro Morgannwg",
				"Warwickshire",
				"West Berkshire",
				"West Dunbartonshire",
				"Waltham Forest",
				"Wigan",
				"Wakefield",
				"Walsall",
				"West Lothian",
				"Wales",
				"Wolverhampton",
				"Wandsworth",
				"Windsor and Maidenhead",
				"Wokingham",
				"Worcestershire",
				"Wirral",
				"Warrington",
				"Wrexham;Wrecsam",
				"Westminster",
				"West Sussex",
				"York",
				"Shetland Islands",
				"Wiltshire"
			]
		},
		{
			"country": "Grenada",
			"states": [
				"Saint Andrew",
				"Saint David",
				"Saint George",
				"Saint John",
				"Saint Mark",
				"Saint Patrick",
				"Southern Grenadine Islands"
			]
		},
		{
			"country": "Georgia",
			"states": [
				"Abkhazia",
				"Ajaria",
				"Guria",
				"Imeret???i",
				"Kakhet???i",
				"K???vemo K???art???li",
				"Mts???khet???a-Mt???ianet???i",
				"Racha-Lech???khumi-K???vemo Svanet???i",
				"Samts???khe-Javakhet???i",
				"Shida K???art???li",
				"Samegrelo-Zemo Svanet???i",
				"T???bilisi"
			]
		},
		{
			"country": "French Guiana",
			"states": []
		},
		{
			"country": "Guernsey",
			"states": []
		},
		{
			"country": "Ghana",
			"states": [
				"Greater Accra",
				"Ashanti",
				"Brong-Ahafo",
				"Central",
				"Eastern",
				"Northern",
				"Volta",
				"Upper East",
				"Upper West",
				"Western"
			]
		},
		{
			"country": "Gibraltar",
			"states": []
		},
		{
			"country": "Greenland",
			"states": [
				"Kommune Kujalleq",
				"Qaasuitsup Kommunia",
				"Qeqqata Kommunia",
				"Kommuneqarfik Sermersooq"
			]
		},
		{
			"country": "Gambia",
			"states": [
				"Banjul",
				"Lower River",
				"Central River",
				"North Bank",
				"Upper River",
				"Western"
			]
		},
		{
			"country": "Guinea",
			"states": [
				"Bok??",
				"Conakry",
				"Kindia",
				"Faranah",
				"Kankan",
				"Lab??",
				"Mamou",
				"Nz??r??kor??"
			]
		},
		{
			"country": "Guadeloupe",
			"states": []
		},
		{
			"country": "Equatorial Guinea",
			"states": [
				"Regi??n Continental",
				"Regi??n Insular"
			]
		},
		{
			"country": "Greece",
			"states": [
				"Agio Oros",
				"Anatoliki Makedonia kai Thraki",
				"Kentriki Makedonia",
				"Dytiki Makedonia",
				"Ipeiros",
				"Thessalia",
				"Ionia Nisia",
				"Dytiki Ellada",
				"Sterea Ellada",
				"Attiki",
				"Peloponnisos",
				"Voreio Aigaio",
				"Notio Aigaio",
				"Kriti"
			]
		},
		{
			"country": "South Georgia and the South Sandwich Islands",
			"states": []
		},
		{
			"country": "Guatemala",
			"states": [
				"Alta Verapaz",
				"Baja Verapaz",
				"Chimaltenango",
				"Chiquimula",
				"Escuintla",
				"Guatemala",
				"Huehuetenango",
				"Izabal",
				"Jalapa",
				"Jutiapa",
				"Pet??n",
				"El Progreso",
				"Quich??",
				"Quetzaltenango",
				"Retalhuleu",
				"Sacatep??quez",
				"San Marcos",
				"Solol??",
				"Santa Rosa",
				"Suchitep??quez",
				"Totonicap??n",
				"Zacapa"
			]
		},
		{
			"country": "Guam",
			"states": []
		},
		{
			"country": "Guinea-Bissau",
			"states": [
				"Bissau",
				"Leste",
				"Norte",
				"Sul"
			]
		},
		{
			"country": "Guyana",
			"states": [
				"Barima-Waini",
				"Cuyuni-Mazaruni",
				"Demerara-Mahaica",
				"East Berbice-Corentyne",
				"Essequibo Islands-West Demerara",
				"Mahaica-Berbice",
				"Pomeroon-Supenaam",
				"Potaro-Siparuni",
				"Upper Demerara-Berbice",
				"Upper Takutu-Upper Essequibo"
			]
		},
		{
			"country": "Hong Kong",
			"states": []
		},
		{
			"country": "Heard Island and McDonald Islands",
			"states": []
		},
		{
			"country": "Honduras",
			"states": [
				"Atl??ntida",
				"Choluteca",
				"Col??n",
				"Comayagua",
				"Cop??n",
				"Cort??s",
				"El Para??so",
				"Francisco Moraz??n",
				"Gracias a Dios",
				"Islas de la Bah??a",
				"Intibuc??",
				"Lempira",
				"La Paz",
				"Ocotepeque",
				"Olancho",
				"Santa B??rbara",
				"Valle",
				"Yoro"
			]
		},
		{
			"country": "Croatia",
			"states": [
				"Zagreba??ka ??upanija",
				"Krapinsko-zagorska ??upanija",
				"Sisa??ko-moslava??ka ??upanija",
				"Karlova??ka ??upanija",
				"Vara??dinska ??upanija",
				"Koprivni??ko-kri??eva??ka ??upanija",
				"Bjelovarsko-bilogorska ??upanija",
				"Primorsko-goranska ??upanija",
				"Li??ko-senjska ??upanija",
				"Viroviti??ko-podravska ??upanija",
				"Po??e??ko-slavonska ??upanija",
				"Brodsko-posavska ??upanija",
				"Zadarska ??upanija",
				"Osje??ko-baranjska ??upanija",
				"??ibensko-kninska ??upanija",
				"Vukovarsko-srijemska ??upanija",
				"Splitsko-dalmatinska ??upanija",
				"Istarska ??upanija",
				"Dubrova??ko-neretvanska ??upanija",
				"Me??imurska ??upanija",
				"Grad Zagreb"
			]
		},
		{
			"country": "Haiti",
			"states": [
				"Artibonite",
				"Centre",
				"Grande-Anse",
				"Nord",
				"Nord-Est",
				"Nord-Ouest",
				"Ouest",
				"Sud",
				"Sud-Est"
			]
		},
		{
			"country": "Hungary",
			"states": [
				"Baranya",
				"B??k??scsaba",
				"B??k??s",
				"B??cs-Kiskun",
				"Budapest",
				"Borsod-Aba??j-Zempl??n",
				"Csongr??d",
				"Debrecen",
				"Duna??jv??ros",
				"Eger",
				"??rd",
				"Fej??r",
				"Gy??r-Moson-Sopron",
				"Gy??r",
				"Hajd??-Bihar",
				"Heves",
				"H??dmez??v??s??rhely",
				"J??sz-Nagykun-Szolnok",
				"Kom??rom-Esztergom",
				"Kecskem??t",
				"Kaposv??r",
				"Miskolc",
				"Nagykanizsa",
				"N??gr??d",
				"Ny??regyh??za",
				"Pest",
				"P??cs",
				"Szeged",
				"Sz??kesfeh??rv??r",
				"Szombathely",
				"Szolnok",
				"Sopron",
				"Somogy",
				"Szeksz??rd",
				"Salg??tarj??n",
				"Szabolcs-Szatm??r-Bereg",
				"Tatab??nya",
				"Tolna",
				"Vas",
				"Veszpr??m (county)",
				"Veszpr??m",
				"Zala",
				"Zalaegerszeg"
			]
		},
		{
			"country": "Indonesia",
			"states": [
				"Papua",
				"Jawa",
				"Kalimantan",
				"Maluku",
				"Nusa Tenggara",
				"Sulawesi",
				"Sumatera"
			]
		},
		{
			"country": "Ireland",
			"states": [
				"Connacht",
				"Leinster",
				"Munster",
				"Ulster"
			]
		},
		{
			"country": "Israel",
			"states": [
				"HaDarom",
				"Hefa",
				"Yerushalayim Al Quds",
				"HaMerkaz",
				"Tel-Aviv",
				"HaZafon"
			]
		},
		{
			"country": "Isle of Man",
			"states": []
		},
		{
			"country": "India",
			"states": [
				"Andaman and Nicobar Islands",
				"Andhra Pradesh",
				"Arunachal Pradesh",
				"Assam",
				"Bihar",
				"Chandigarh",
				"Chhattisgarh",
				"Damen and Diu",
				"Delhi",
				"Dadra and Nagar Haveli",
				"Goa",
				"Gujarat",
				"Himachal Pradesh",
				"Haryana",
				"Jharkhand",
				"Jammu and Kashmir",
				"Karnataka",
				"Kerala",
				"Lakshadweep",
				"Maharashtra",
				"Meghalaya",
				"Manipur",
				"Madhya Pradesh",
				"Mizoram",
				"Nagaland",
				"Orissa",
				"Punjab",
				"Puducherry",
				"Rajasthan",
				"Sikkim",
				"Tamil Nadu",
				"Tripura",
				"Uttar Pradesh",
				"Uttarakhand",
				"West Bengal"
			]
		},
		{
			"country": "British Indian Ocean Territory",
			"states": []
		},
		{
			"country": "Iraq",
			"states": [
				"Al Anbar",
				"Arbil",
				"Al Basrah",
				"Babil",
				"Baghdad",
				"Dahuk",
				"Diyala",
				"Dhi Qar",
				"Karbala'",
				"Maysan",
				"Al Muthanna",
				"An Najef",
				"Ninawa",
				"Al Qadisiyah",
				"Salah ad Din",
				"As Sulaymaniyah",
				"At Ta'mim",
				"Wasit"
			]
		},
		{
			"country": "Iran, Islamic Republic of",
			"states": [
				"??zarb??yj??n-e Sharq??",
				"??zarb??yj??n-e Gharb??",
				"Ardab??l",
				"E??fah??n",
				"??l??m",
				"B??shehr",
				"Tehr??n",
				"Chah??r Mah??ll va Bakht????r??",
				"Kh??zest??n",
				"Zanj??n",
				"Semn??n",
				"S??st??n va Bal??chest??n",
				"F??rs",
				"Kerm??n",
				"Kordest??n",
				"Kerm??nsh??h",
				"Kohg??l??yeh va B??yer Ahmad",
				"G??l??n",
				"Lorest??n",
				"M??zandar??n",
				"Markaz??",
				"Hormozg??n",
				"Hamad??n",
				"Yazd",
				"Qom",
				"Golest??n",
				"Qazv??n",
				"Khor??s??n-e Jan??b??",
				"Khor??s??n-e Razav??",
				"Khor??s??n-e Shem??l??"
			]
		},
		{
			"country": "Iceland",
			"states": [
				"Reykjav??k",
				"H??fu??borgarsv????i??",
				"Su??urnes",
				"Vesturland",
				"Vestfir??ir",
				"Nor??urland vestra",
				"Nor??urland eystra",
				"Austurland",
				"Su??urland"
			]
		},
		{
			"country": "Italy",
			"states": [
				"Piemonte",
				"Valle d'Aosta",
				"Lombardia",
				"Trentino-Alto Adige",
				"Veneto",
				"Friuli-Venezia Giulia",
				"Liguria",
				"Emilia-Romagna",
				"Toscana",
				"Umbria",
				"Marche",
				"Lazio",
				"Abruzzo",
				"Molise",
				"Campania",
				"Puglia",
				"Basilicata",
				"Calabria",
				"Sicilia",
				"Sardegna"
			]
		},
		{
			"country": "Jersey",
			"states": []
		},
		{
			"country": "Jamaica",
			"states": [
				"Kingston",
				"Saint Andrew",
				"Saint Thomas",
				"Portland",
				"Saint Mary",
				"Saint Ann",
				"Trelawny",
				"Saint James",
				"Hanover",
				"Westmoreland",
				"Saint Elizabeth",
				"Manchester",
				"Clarendon",
				"Saint Catherine"
			]
		},
		{
			"country": "Jordan",
			"states": [
				"???Ajl??n",
				"???Amm??n (Al ???A??imah)",
				"Al ???Aqabah",
				"A?? ??af??lah",
				"Az Zarq??'",
				"Al Balq??'",
				"Irbid",
				"Jarash",
				"Al Karak",
				"Al Mafraq",
				"M??dab??",
				"Ma?????n"
			]
		},
		{
			"country": "Japan",
			"states": [
				"Hokkaido",
				"Aomori",
				"Iwate",
				"Miyagi",
				"Akita",
				"Yamagata",
				"Fukushima",
				"Ibaraki",
				"Tochigi",
				"Gunma",
				"Saitama",
				"Chiba",
				"Tokyo",
				"Kanagawa",
				"Niigata",
				"Toyama",
				"Ishikawa",
				"Fukui",
				"Yamanashi",
				"Nagano",
				"Gifu",
				"Shizuoka",
				"Aichi",
				"Mie",
				"Shiga",
				"Kyoto",
				"Osaka",
				"Hyogo",
				"Nara",
				"Wakayama",
				"Tottori",
				"Shimane",
				"Okayama",
				"Hiroshima",
				"Yamaguchi",
				"Tokushima",
				"Kagawa",
				"Ehime",
				"Kochi",
				"Fukuoka",
				"Saga",
				"Nagasaki",
				"Kumamoto",
				"Oita",
				"Miyazaki",
				"Kagoshima",
				"Okinawa"
			]
		},
		{
			"country": "Kenya",
			"states": [
				"Nairobi Municipality",
				"Central",
				"Coast",
				"Eastern",
				"North-Eastern Kaskazini Mashariki",
				"Rift Valley",
				"Western Magharibi"
			]
		},
		{
			"country": "Kyrgyzstan",
			"states": [
				"Batken",
				"Ch??",
				"Bishkek",
				"Jalal-Abad",
				"Naryn",
				"Osh",
				"Talas",
				"Ysyk-K??l"
			]
		},
		{
			"country": "Cambodia",
			"states": [
				"Banteay Mean Chey",
				"Krachoh",
				"Mondol Kiri",
				"Phnom Penh",
				"Preah Vihear",
				"Prey Veaeng",
				"Pousaat",
				"Rotanak Kiri",
				"Siem Reab",
				"Krong Preah Sihanouk",
				"Stueng Traeng",
				"Battambang",
				"Svaay Rieng",
				"Taakaev",
				"Otdar Mean Chey",
				"Krong Kaeb",
				"Krong Pailin",
				"Kampong Cham",
				"Kampong Chhnang",
				"Kampong Speu",
				"Kampong Thom",
				"Kampot",
				"Kandal",
				"Kach Kong"
			]
		},
		{
			"country": "Kiribati",
			"states": [
				"Gilbert Islands",
				"Line Islands",
				"Phoenix Islands"
			]
		},
		{
			"country": "Comoros",
			"states": [
				"Andjou??n (Anjw??n)",
				"Andjaz??dja (Anjaz??jah)",
				"Mo??h??l?? (M??h??l??)"
			]
		},
		{
			"country": "Saint Kitts and Nevis",
			"states": [
				"Saint Kitts",
				"Nevis"
			]
		},
		{
			"country": "Korea, Democratic People's Republic of",
			"states": [
				"P???y??ngyang",
				"P???y??ngan-namdo",
				"P???y??ngan-bukto",
				"Chagang-do",
				"Hwanghae-namdo",
				"Hwanghae-bukto",
				"Kangw??n-do",
				"Hamgy??ng-namdo",
				"Hamgy??ng-bukto",
				"Yanggang-do",
				"Nas??n (Najin-S??nbong)"
			]
		},
		{
			"country": "Korea, Republic of",
			"states": [
				"Seoul Teugbyeolsi",
				"Busan Gwang'yeogsi",
				"Daegu Gwang'yeogsi",
				"Incheon Gwang'yeogsi",
				"Gwangju Gwang'yeogsi",
				"Daejeon Gwang'yeogsi",
				"Ulsan Gwang'yeogsi",
				"Gyeonggido",
				"Gang'weondo",
				"Chungcheongbukdo",
				"Chungcheongnamdo",
				"Jeonrabukdo",
				"Jeonranamdo",
				"Gyeongsangbukdo",
				"Gyeongsangnamdo",
				"Jejudo"
			]
		},
		{
			"country": "Kuwait",
			"states": [
				"Al Ahmadi",
				"Al Farw??n??yah",
				"Hawall??",
				"Al Jahrr?????",
				"Al Kuwayt (Al ???????imah)",
				"Mub??rak al Kab??r"
			]
		},
		{
			"country": "Cayman Islands",
			"states": []
		},
		{
			"country": "Kazakhstan",
			"states": [
				"Aqmola oblysy",
				"Aqt??be oblysy",
				"Almaty",
				"Almaty oblysy",
				"Astana",
				"Atyra?? oblysy",
				"Qaraghandy oblysy",
				"Qostanay oblysy",
				"Qyzylorda oblysy",
				"Mangghysta?? oblysy",
				"Pavlodar oblysy",
				"Solt??stik Quzaqstan oblysy",
				"Shyghys Qazaqstan oblysy",
				"Ongt??stik Qazaqstan oblysy",
				"Batys Quzaqstan oblysy",
				"Zhambyl oblysy"
			]
		},
		{
			"country": "Lao People's Democratic Republic",
			"states": [
				"Attapu",
				"Bok??o",
				"Bolikhamxai",
				"Champasak",
				"Houaphan",
				"Khammouan",
				"Louang Namtha",
				"Louangphabang",
				"Oud??mxai",
				"Ph??ngsali",
				"Salavan",
				"Savannakh??t",
				"Vientiane",
				"Vientiane",
				"Xaignabouli",
				"X??kong",
				"Xiangkhoang",
				"Xias??mboun"
			]
		},
		{
			"country": "Lebanon",
			"states": [
				"Aakk??r",
				"Liban-Nord",
				"Beyrouth",
				"Baalbek-Hermel",
				"B??qaa",
				"Liban-Sud",
				"Mont-Liban",
				"Nabat??y??"
			]
		},
		{
			"country": "Saint Lucia",
			"states": []
		},
		{
			"country": "Liechtenstein",
			"states": [
				"Balzers",
				"Eschen",
				"Gamprin",
				"Mauren",
				"Planken",
				"Ruggell",
				"Schaan",
				"Schellenberg",
				"Triesen",
				"Triesenberg",
				"Vaduz"
			]
		},
		{
			"country": "Sri Lanka",
			"states": [
				"Basn??hira pa?????ta",
				"Madhyama pa?????ta",
				"Daku???u pa?????ta",
				"Uturu pa?????ta",
				"N????g??nahira pa?????ta",
				"Vayamba pa?????ta",
				"Uturum????da pa?????ta",
				"??va pa?????ta",
				"Sabaragamuva pa?????ta"
			]
		},
		{
			"country": "Liberia",
			"states": [
				"Bong",
				"Bomi",
				"Grand Cape Mount",
				"Grand Bassa",
				"Grand Gedeh",
				"Grand Kru",
				"Lofa",
				"Margibi",
				"Montserrado",
				"Maryland",
				"Nimba",
				"Rivercess",
				"Sinoe"
			]
		},
		{
			"country": "Lesotho",
			"states": [
				"Maseru",
				"Butha-Buthe",
				"Leribe",
				"Berea",
				"Mafeteng",
				"Mohale's Hoek",
				"Quthing",
				"Qacha's Nek",
				"Mokhotlong",
				"Thaba-Tseka"
			]
		},
		{
			"country": "Lithuania",
			"states": [
				"Alytaus Apskritis",
				"Klaip??dos Apskritis",
				"Kauno Apskritis",
				"Marijampol??s Apskritis",
				"Panev????io Apskritis",
				"??iauli?? Apskritis",
				"Taurag??s Apskritis",
				"Tel??i?? Apskritis",
				"Utenos Apskritis",
				"Vilniaus Apskritis"
			]
		},
		{
			"country": "Luxembourg",
			"states": [
				"Diekirch",
				"Grevenmacher",
				"Luxembourg"
			]
		},
		{
			"country": "Latvia",
			"states": [
				"Aglonas novads",
				"Aizkraukles novads",
				"Aizputes novads",
				"Akn??stes novads",
				"Alojas novads",
				"Alsungas novads",
				"Al??ksnes novads",
				"Amatas novads",
				"Apes novads",
				"Auces novads",
				"??da??u novads",
				"Bab??tes novads",
				"Baldones novads",
				"Baltinavas novads",
				"Balvu novads",
				"Bauskas novads",
				"Bever??nas novads",
				"Broc??nu novads",
				"Burtnieku novads",
				"Carnikavas novads",
				"Cesvaines novads",
				"C??su novads",
				"Ciblas novads",
				"Dagdas novads",
				"Daugavpils novads",
				"Dobeles novads",
				"Dundagas novads",
				"Durbes novads",
				"Engures novads",
				"??rg??u novads",
				"Garkalnes novads",
				"Grobi??as novads",
				"Gulbenes novads",
				"Iecavas novads",
				"Ik????iles novads",
				"Il??kstes novads",
				"In??ukalna novads",
				"Jaunjelgavas novads",
				"Jaunpiebalgas novads",
				"Jaunpils novads",
				"Jelgavas novads",
				"J??kabpils novads",
				"Kandavas novads",
				"K??rsavas novads",
				"Koc??nu novads",
				"Kokneses novads",
				"Kr??slavas novads",
				"Krimuldas novads",
				"Krustpils novads",
				"Kuld??gas novads",
				"??eguma novads",
				"??ekavas novads",
				"Lielv??rdes novads",
				"Limba??u novads",
				"L??gatnes novads",
				"L??v??nu novads",
				"Lub??nas novads",
				"Ludzas novads",
				"Madonas novads",
				"Mazsalacas novads",
				"M??lpils novads",
				"M??rupes novads",
				"M??rsraga novads",
				"Nauk????nu novads",
				"Neretas novads",
				"N??cas novads",
				"Ogres novads",
				"Olaines novads",
				"Ozolnieku novads",
				"P??rgaujas novads",
				"P??vilostas novads",
				"P??avi??u novads",
				"Prei??u novads",
				"Priekules novads",
				"Prieku??u novads",
				"Raunas novads",
				"R??zeknes novads",
				"Riebi??u novads",
				"Rojas novads",
				"Ropa??u novads",
				"Rucavas novads",
				"Rug??ju novads",
				"Rund??les novads",
				"R??jienas novads",
				"Salas novads",
				"Salacgr??vas novads",
				"Salaspils novads",
				"Saldus novads",
				"Saulkrastu novads",
				"S??jas novads",
				"Siguldas novads",
				"Skr??veru novads",
				"Skrundas novads",
				"Smiltenes novads",
				"Stopi??u novads",
				"Stren??u novads",
				"Talsu novads",
				"T??rvetes novads",
				"Tukuma novads",
				"Vai??odes novads",
				"Valkas novads",
				"Varak????nu novads",
				"V??rkavas novads",
				"Vecpiebalgas novads",
				"Vecumnieku novads",
				"Ventspils novads",
				"Vies??tes novads",
				"Vi??akas novads",
				"Vi????nu novads",
				"Zilupes novads",
				"Daugavpils",
				"Jelgava",
				"J??kabpils",
				"J??rmala",
				"Liep??ja",
				"R??zekne",
				"R??ga",
				"Ventspils",
				"Valmiera"
			]
		},
		{
			"country": "Libya",
			"states": [
				"Bangh??z??",
				"Al Bu??n??n",
				"Darnah",
				"Gh??t",
				"Al Jabal al Akh???ar",
				"Jaghb??b",
				"Al Jabal al Gharb??",
				"Al Jif??rah",
				"Al Jufrah",
				"Al Kufrah",
				"Al Marqab",
				"Mi??r??tah",
				"Al Marj",
				"Murzuq",
				"N??l??t",
				"An Nuqa?? al Khams",
				"Sabh??",
				"Surt",
				"??ar??bulus",
				"Al W???????t",
				"W??d?? al ???ay??t",
				"W??d?? ash Sh????i??",
				"Az Z??wiyah"
			]
		},
		{
			"country": "Morocco",
			"states": [
				"Tanger-T??touan",
				"Gharb-Chrarda-Beni Hssen",
				"Taza-Al Hoceima-Taounate",
				"L'Oriental",
				"F??s-Boulemane",
				"Mekn??s-Tafilalet",
				"Rabat-Sal??-Zemmour-Zaer",
				"Grand Casablanca",
				"Chaouia-Ouardigha",
				"Doukhala-Abda",
				"Marrakech-Tensift-Al Haouz",
				"Tadla-Azilal",
				"Sous-Massa-Draa",
				"Guelmim-Es Smara",
				"La??youne-Boujdour-Sakia el Hamra",
				"Oued ed Dahab-Lagouira"
			]
		},
		{
			"country": "Monaco",
			"states": [
				"La Colle",
				"La Condamine",
				"Fontvieille",
				"La Gare",
				"Jardin Exotique",
				"Larvotto",
				"Malbousquet",
				"Monte-Carlo",
				"Moneghetti",
				"Monaco-Ville",
				"Moulins",
				"Port-Hercule",
				"Sainte-D??vote",
				"La Source",
				"Sp??lugues",
				"Saint-Roman",
				"Vallon de la Rousse"
			]
		},
		{
			"country": "Moldova, Republic of",
			"states": [
				"Anenii Noi",
				"B??l??i",
				"Tighina",
				"Briceni",
				"Basarabeasca",
				"Cahul",
				"C??l??ra??i",
				"Cimi??lia",
				"Criuleni",
				"C??u??eni",
				"Cantemir",
				"Chi??in??u",
				"Dondu??eni",
				"Drochia",
				"Dub??sari",
				"Edine??",
				"F??le??ti",
				"Flore??ti",
				"G??g??uzia, Unitatea teritorial?? autonom??",
				"Glodeni",
				"H??nce??ti",
				"Ialoveni",
				"Leova",
				"Nisporeni",
				"Ocni??a",
				"Orhei",
				"Rezina",
				"R????cani",
				"??old??ne??ti",
				"S??ngerei",
				"St??nga Nistrului, unitatea teritorial?? din",
				"Soroca",
				"Str????eni",
				"??tefan Vod??",
				"Taraclia",
				"Telene??ti",
				"Ungheni"
			]
		},
		{
			"country": "Montenegro",
			"states": [
				"Andrijevica",
				"Bar",
				"Berane",
				"Bijelo Polje",
				"Budva",
				"Cetinje",
				"Danilovgrad",
				"Herceg-Novi",
				"Kola??in",
				"Kotor",
				"Mojkovac",
				"Nik??i??",
				"Plav",
				"Pljevlja",
				"Plu??ine",
				"Podgorica",
				"Ro??aje",
				"??avnik",
				"Tivat",
				"Ulcinj",
				"??abljak"
			]
		},
		{
			"country": "Saint Martin (French part)",
			"states": []
		},
		{
			"country": "Madagascar",
			"states": [
				"Toamasina",
				"Antsiranana",
				"Fianarantsoa",
				"Mahajanga",
				"Antananarivo",
				"Toliara"
			]
		},
		{
			"country": "Marshall Islands",
			"states": [
				"Ralik chain",
				"Ratak chain"
			]
		},
		{
			"country": "Macedonia, Republic of",
			"states": [
				"Aerodrom",
				"Ara??inovo",
				"Berovo",
				"Bitola",
				"Bogdanci",
				"Bogovinje",
				"Bosilovo",
				"Brvenica",
				"Butel",
				"Valandovo",
				"Vasilevo",
				"Vev??ani",
				"Veles",
				"Vinica",
				"Vrane??tica",
				"Vrap??i??te",
				"Gazi Baba",
				"Gevgelija",
				"Gostivar",
				"Gradsko",
				"Debar",
				"Debarca",
				"Del??evo",
				"Demir Kapija",
				"Demir Hisar",
				"Dojran",
				"Dolneni",
				"Drugovo",
				"Gjor??e Petrov",
				"??elino",
				"Zajas",
				"Zelenikovo",
				"Zrnovci",
				"Ilinden",
				"Jegunovce",
				"Kavadarci",
				"Karbinci",
				"Karpo??",
				"Kisela Voda",
				"Ki??evo",
				"Kon??e",
				"Ko??ani",
				"Kratovo",
				"Kriva Palanka",
				"Krivoga??tani",
				"Kru??evo",
				"Kumanovo",
				"Lipkovo",
				"Lozovo",
				"Mavrovo-i-Rostu??a",
				"Makedonska Kamenica",
				"Makedonski Brod",
				"Mogila",
				"Negotino",
				"Novaci",
				"Novo Selo",
				"Oslomej",
				"Ohrid",
				"Petrovec",
				"Peh??evo",
				"Plasnica",
				"Prilep",
				"Probi??tip",
				"Radovi??",
				"Rankovce",
				"Resen",
				"Rosoman",
				"Saraj",
				"Sveti Nikole",
				"Sopi??te",
				"Staro Nagori??ane",
				"Struga",
				"Strumica",
				"Studeni??ani",
				"Tearce",
				"Tetovo",
				"Centar",
				"Centar ??upa",
				"??air",
				"??a??ka",
				"??e??inovo-Oble??evo",
				"??u??er Sandevo",
				"??tip",
				"??uto Orizari"
			]
		},
		{
			"country": "Mali",
			"states": [
				"Kayes",
				"Koulikoro",
				"Sikasso",
				"S??gou",
				"Mopti",
				"Tombouctou",
				"Gao",
				"Kidal",
				"Bamako"
			]
		},
		{
			"country": "Myanmar",
			"states": [
				"Sagaing",
				"Bago",
				"Magway",
				"Mandalay",
				"Tanintharyi",
				"Yangon",
				"Ayeyarwady",
				"Kachin",
				"Kayah",
				"Kayin",
				"Chin",
				"Mon",
				"Rakhine",
				"Shan"
			]
		},
		{
			"country": "Mongolia",
			"states": [
				"Orhon",
				"Darhan uul",
				"Hentiy",
				"H??vsg??l",
				"Hovd",
				"Uvs",
				"T??v",
				"Selenge",
				"S??hbaatar",
				"??mn??govi",
				"??v??rhangay",
				"Dzavhan",
				"Dundgovi",
				"Dornod",
				"Dornogovi",
				"Govi-Sumber",
				"Govi-Altay",
				"Bulgan",
				"Bayanhongor",
				"Bayan-??lgiy",
				"Arhangay",
				"Ulanbaatar"
			]
		},
		{
			"country": "Macao",
			"states": []
		},
		{
			"country": "Northern Mariana Islands",
			"states": []
		},
		{
			"country": "Martinique",
			"states": []
		},
		{
			"country": "Mauritania",
			"states": [
				"Hodh ech Chargui",
				"Hodh el Charbi",
				"Assaba",
				"Gorgol",
				"Brakna",
				"Trarza",
				"Adrar",
				"Dakhlet Nouadhibou",
				"Tagant",
				"Guidimaka",
				"Tiris Zemmour",
				"Inchiri",
				"Nouakchott"
			]
		},
		{
			"country": "Montserrat",
			"states": []
		},
		{
			"country": "Malta",
			"states": [
				"Attard",
				"Balzan",
				"Birgu",
				"Birkirkara",
				"Bir??ebbu??a",
				"Bormla",
				"Dingli",
				"Fgura",
				"Floriana",
				"Fontana",
				"Gudja",
				"G??ira",
				"G??ajnsielem",
				"G??arb",
				"G??arg??ur",
				"G??asri",
				"G??axaq",
				"??amrun",
				"Iklin",
				"Isla",
				"Kalkara",
				"Ker??em",
				"Kirkop",
				"Lija",
				"Luqa",
				"Marsa",
				"Marsaskala",
				"Marsaxlokk",
				"Mdina",
				"Mellie??a",
				"M??arr",
				"Mosta",
				"Mqabba",
				"Msida",
				"Mtarfa",
				"Munxar",
				"Nadur",
				"Naxxar",
				"Paola",
				"Pembroke",
				"Piet??",
				"Qala",
				"Qormi",
				"Qrendi",
				"Rabat G??awdex",
				"Rabat Malta",
				"Safi",
				"San ??iljan",
				"San ??wann",
				"San Lawrenz",
				"San Pawl il-Ba??ar",
				"Sannat",
				"Santa Lu??ija",
				"Santa Venera",
				"Si????iewi",
				"Sliema",
				"Swieqi",
				"Ta??? Xbiex",
				"Tarxien",
				"Valletta",
				"Xag??ra",
				"Xewkija",
				"Xg??ajra",
				"??abbar",
				"??ebbu?? G??awdex",
				"??ebbu?? Malta",
				"??ejtun",
				"??urrieq"
			]
		},
		{
			"country": "Mauritius",
			"states": [
				"Agalega Islands",
				"Black River",
				"Beau Bassin-Rose Hill",
				"Cargados Carajos Shoals",
				"Curepipe",
				"Flacq",
				"Grand Port",
				"Moka",
				"Pamplemousses",
				"Port Louis",
				"Port Louis",
				"Plaines Wilhems",
				"Quatre Bornes",
				"Rodrigues Island",
				"Rivi??re du Rempart",
				"Savanne",
				"Vacoas-Phoenix"
			]
		},
		{
			"country": "Maldives",
			"states": [
				"Central",
				"Male",
				"North Central",
				"North",
				"South Central",
				"South",
				"Upper North",
				"Upper South"
			]
		},
		{
			"country": "Malawi",
			"states": [
				"Central Region",
				"Northern Region",
				"Southern Region"
			]
		},
		{
			"country": "Mexico",
			"states": [
				"Aguascalientes",
				"Baja California",
				"Baja California Sur",
				"Campeche",
				"Chihuahua",
				"Chiapas",
				"Coahuila",
				"Colima",
				"Distrito Federal",
				"Durango",
				"Guerrero",
				"Guanajuato",
				"Hidalgo",
				"Jalisco",
				"M??xico",
				"Michoac??n",
				"Morelos",
				"Nayarit",
				"Nuevo Le??n",
				"Oaxaca",
				"Puebla",
				"Quer??taro",
				"Quintana Roo",
				"Sinaloa",
				"San Luis Potos??",
				"Sonora",
				"Tabasco",
				"Tamaulipas",
				"Tlaxcala",
				"Veracruz",
				"Yucat??n",
				"Zacatecas"
			]
		},
		{
			"country": "Malaysia",
			"states": [
				"Johor",
				"Kedah",
				"Kelantan",
				"Melaka",
				"Negeri Sembilan",
				"Pahang",
				"Pulau Pinang",
				"Perak",
				"Perlis",
				"Selangor",
				"Terengganu",
				"Sabah",
				"Sarawak",
				"Wilayah Persekutuan Kuala Lumpur",
				"Wilayah Persekutuan Labuan",
				"Wilayah Persekutuan Putrajaya"
			]
		},
		{
			"country": "Mozambique",
			"states": [
				"Niassa",
				"Manica",
				"Gaza",
				"Inhambane",
				"Maputo",
				"Maputo (city)",
				"Numpula",
				"Cabo Delgado",
				"Zambezia",
				"Sofala",
				"Tete"
			]
		},
		{
			"country": "Namibia",
			"states": [
				"Caprivi",
				"Erongo",
				"Hardap",
				"Karas",
				"Khomas",
				"Kunene",
				"Otjozondjupa",
				"Omaheke",
				"Okavango",
				"Oshana",
				"Omusati",
				"Oshikoto",
				"Ohangwena"
			]
		},
		{
			"country": "New Caledonia",
			"states": []
		},
		{
			"country": "Niger",
			"states": [
				"Agadez",
				"Diffa",
				"Dosso",
				"Maradi",
				"Tahoua",
				"Tillab??ri",
				"Zinder",
				"Niamey"
			]
		},
		{
			"country": "Norfolk Island",
			"states": []
		},
		{
			"country": "Nigeria",
			"states": [
				"Abia",
				"Adamawa",
				"Akwa Ibom",
				"Anambra",
				"Bauchi",
				"Benue",
				"Borno",
				"Bayelsa",
				"Cross River",
				"Delta",
				"Ebonyi",
				"Edo",
				"Ekiti",
				"Enugu",
				"Abuja Capital Territory",
				"Gombe",
				"Imo",
				"Jigawa",
				"Kaduna",
				"Kebbi",
				"Kano",
				"Kogi",
				"Katsina",
				"Kwara",
				"Lagos",
				"Nassarawa",
				"Niger",
				"Ogun",
				"Ondo",
				"Osun",
				"Oyo",
				"Plateau",
				"Rivers",
				"Sokoto",
				"Taraba",
				"Yobe",
				"Zamfara"
			]
		},
		{
			"country": "Nicaragua",
			"states": [
				"Atl??ntico Norte",
				"Atl??ntico Sur",
				"Boaco",
				"Carazo",
				"Chinandega",
				"Chontales",
				"Estel??",
				"Granada",
				"Jinotega",
				"Le??n",
				"Madriz",
				"Managua",
				"Masaya",
				"Matagalpa",
				"Nueva Segovia",
				"Rivas",
				"R??o San Juan"
			]
		},
		{
			"country": "Netherlands",
			"states": [
				"Aruba",
				"Bonaire",
				"Saba",
				"Sint Eustatius",
				"Cura??ao",
				"Drenthe",
				"Flevoland",
				"Friesland",
				"Gelderland",
				"Groningen",
				"Limburg",
				"Noord-Brabant",
				"Noord-Holland",
				"Overijssel",
				"Sint Maarten",
				"Utrecht",
				"Zeeland",
				"Zuid-Holland"
			]
		},
		{
			"country": "Norway",
			"states": [
				"??stfold",
				"Akershus",
				"Oslo",
				"Hedmark",
				"Oppland",
				"Buskerud",
				"Vestfold",
				"Telemark",
				"Aust-Agder",
				"Vest-Agder",
				"Rogaland",
				"Hordaland",
				"Sogn og Fjordane",
				"M??re og Romsdal",
				"S??r-Tr??ndelag",
				"Nord-Tr??ndelag",
				"Nordland",
				"Troms",
				"Finnmark",
				"Svalbard (Arctic Region)",
				"Jan Mayen (Arctic Region)"
			]
		},
		{
			"country": "Nepal",
			"states": [
				"Madhyamanchal",
				"Madhya Pashchimanchal",
				"Pashchimanchal",
				"Purwanchal",
				"Sudur Pashchimanchal"
			]
		},
		{
			"country": "Nauru",
			"states": [
				"Aiwo",
				"Anabar",
				"Anetan",
				"Anibare",
				"Baiti",
				"Boe",
				"Buada",
				"Denigomodu",
				"Ewa",
				"Ijuw",
				"Meneng",
				"Nibok",
				"Uaboe",
				"Yaren"
			]
		},
		{
			"country": "Niue",
			"states": []
		},
		{
			"country": "New Zealand",
			"states": [
				"Chatham Islands Territory",
				"North Island",
				"South Island"
			]
		},
		{
			"country": "Oman",
			"states": [
				"Al B????inah",
				"Al Buraym??",
				"Ad D??khil??ya",
				"Masqa??",
				"Musandam",
				"Ash Sharq??yah",
				"Al Wus????",
				"Az?? Z????hirah",
				"Z??uf??r"
			]
		},
		{
			"country": "Panama",
			"states": [
				"Bocas del Toro",
				"Cocl??",
				"Col??n",
				"Chiriqu??",
				"Dari??n",
				"Herrera",
				"Los Santos",
				"Panam??",
				"Veraguas",
				"Ember??",
				"Kuna Yala",
				"Ng??be-Bugl??"
			]
		},
		{
			"country": "Peru",
			"states": [
				"Amazonas",
				"Ancash",
				"Apur??mac",
				"Arequipa",
				"Ayacucho",
				"Cajamarca",
				"El Callao",
				"Cusco [Cuzco]",
				"Hu??nuco",
				"Huancavelica",
				"Ica",
				"Jun??n",
				"La Libertad",
				"Lambayeque",
				"Lima",
				"Municipalidad Metropolitana de Lima",
				"Loreto",
				"Madre de Dios",
				"Moquegua",
				"Pasco",
				"Piura",
				"Puno",
				"San Mart??n",
				"Tacna",
				"Tumbes",
				"Ucayali"
			]
		},
		{
			"country": "French Polynesia",
			"states": []
		},
		{
			"country": "Papua New Guinea",
			"states": [
				"Chimbu",
				"Central",
				"East New Britain",
				"Eastern Highlands",
				"Enga",
				"East Sepik",
				"Gulf",
				"Milne Bay",
				"Morobe",
				"Madang",
				"Manus",
				"National Capital District (Port Moresby)",
				"New Ireland",
				"Northern",
				"Bougainville",
				"Sandaun",
				"Southern Highlands",
				"West New Britain",
				"Western Highlands",
				"Western"
			]
		},
		{
			"country": "Philippines",
			"states": [
				"National Capital Region",
				"Ilocos (Region I)",
				"Cagayan Valley (Region II)",
				"Central Luzon (Region III)",
				"Bicol (Region V)",
				"Western Visayas (Region VI)",
				"Central Visayas (Region VII)",
				"Eastern Visayas (Region VIII)",
				"Zamboanga Peninsula (Region IX)",
				"Northern Mindanao (Region X)",
				"Davao (Region XI)",
				"Soccsksargen (Region XII)",
				"Caraga (Region XIII)",
				"Autonomous Region in Muslim Mindanao (ARMM)",
				"Cordillera Administrative Region (CAR)",
				"CALABARZON (Region IV-A)",
				"MIMAROPA (Region IV-B)"
			]
		},
		{
			"country": "Pakistan",
			"states": [
				"Balochistan",
				"Gilgit-Baltistan",
				"Islamabad",
				"Azad Kashmir",
				"Khyber Pakhtunkhwa",
				"Punjab",
				"Sindh",
				"Federally Administered Tribal Areas"
			]
		},
		{
			"country": "Poland",
			"states": [
				"Dolno??l??skie",
				"Kujawsko-pomorskie",
				"Lubuskie",
				"????dzkie",
				"Lubelskie",
				"Ma??opolskie",
				"Mazowieckie",
				"Opolskie",
				"Podlaskie",
				"Podkarpackie",
				"Pomorskie",
				"??wi??tokrzyskie",
				"??l??skie",
				"Warmi??sko-mazurskie",
				"Wielkopolskie",
				"Zachodniopomorskie"
			]
		},
		{
			"country": "Saint Pierre and Miquelon",
			"states": []
		},
		{
			"country": "Pitcairn",
			"states": []
		},
		{
			"country": "Palestine, State of",
			"states": [
				"Bethlehem",
				"Deir El Balah",
				"Gaza",
				"Hebron",
				"Jerusalem",
				"Jenin",
				"Jericho - Al Aghwar",
				"Khan Yunis",
				"Nablus",
				"North Gaza",
				"Qalqilya",
				"Ramallah",
				"Rafah",
				"Salfit",
				"Tubas",
				"Tulkarm"
			]
		},
		{
			"country": "Portugal",
			"states": [
				"Aveiro",
				"Beja",
				"Braga",
				"Bragan??a",
				"Castelo Branco",
				"Coimbra",
				"??vora",
				"Faro",
				"Guarda",
				"Leiria",
				"Lisboa",
				"Portalegre",
				"Porto",
				"Santar??m",
				"Set??bal",
				"Viana do Castelo",
				"Vila Real",
				"Viseu",
				"Regi??o Aut??noma dos A??ores",
				"Regi??o Aut??noma da Madeira"
			]
		},
		{
			"country": "Palau",
			"states": [
				"Aimeliik",
				"Airai",
				"Angaur",
				"Hatobohei",
				"Kayangel",
				"Koror",
				"Melekeok",
				"Ngaraard",
				"Ngarchelong",
				"Ngardmau",
				"Ngatpang",
				"Ngchesar",
				"Ngeremlengui",
				"Ngiwal",
				"Peleliu",
				"Sonsorol"
			]
		},
		{
			"country": "Paraguay",
			"states": [
				"Concepci??n",
				"Alto Paran??",
				"Central",
				"??eembuc??",
				"Amambay",
				"Canindey??",
				"Presidente Hayes",
				"Alto Paraguay",
				"Boquer??n",
				"San Pedro",
				"Cordillera",
				"Guair??",
				"Caaguaz??",
				"Caazap??",
				"Itap??a",
				"Misiones",
				"Paraguar??",
				"Asunci??n"
			]
		},
		{
			"country": "Qatar",
			"states": [
				"Ad Dawhah",
				"Al Khawr wa adh Dhakh??rah",
				"Ash Shamal",
				"Ar Rayyan",
				"Umm Salal",
				"Al Wakrah",
				"Az?? Z??a?????yin"
			]
		},
		{
			"country": "R??union",
			"states": []
		},
		{
			"country": "Romania",
			"states": [
				"Alba",
				"Arge??",
				"Arad",
				"Bucure??ti",
				"Bac??u",
				"Bihor",
				"Bistri??a-N??s??ud",
				"Br??ila",
				"Boto??ani",
				"Bra??ov",
				"Buz??u",
				"Cluj",
				"C??l??ra??i",
				"Cara??-Severin",
				"Constan??a",
				"Covasna",
				"D??mbovi??a",
				"Dolj",
				"Gorj",
				"Gala??i",
				"Giurgiu",
				"Hunedoara",
				"Harghita",
				"Ilfov",
				"Ialomi??a",
				"Ia??i",
				"Mehedin??i",
				"Maramure??",
				"Mure??",
				"Neam??",
				"Olt",
				"Prahova",
				"Sibiu",
				"S??laj",
				"Satu Mare",
				"Suceava",
				"Tulcea",
				"Timi??",
				"Teleorman",
				"V??lcea",
				"Vrancea",
				"Vaslui"
			]
		},
		{
			"country": "Serbia",
			"states": [
				"Beograd",
				"Ma??vanski okrug",
				"Kolubarski okrug",
				"Podunavski okrug",
				"Brani??evski okrug",
				"??umadijski okrug",
				"Pomoravski okrug",
				"Borski okrug",
				"Zaje??arski okrug",
				"Zlatiborski okrug",
				"Moravi??ki okrug",
				"Ra??ki okrug",
				"Rasinski okrug",
				"Ni??avski okrug",
				"Topli??ki okrug",
				"Pirotski okrug",
				"Jablani??ki okrug",
				"P??injski okrug",
				"Kosovo-Metohija",
				"Vojvodina"
			]
		},
		{
			"country": "Russian Federation",
			"states": [
				"Adygeya, Respublika",
				"Altay, Respublika",
				"Altayskiy kray",
				"Amurskaya oblast'",
				"Arkhangel'skaya oblast'",
				"Astrakhanskaya oblast'",
				"Bashkortostan, Respublika",
				"Belgorodskaya oblast'",
				"Bryanskaya oblast'",
				"Buryatiya, Respublika",
				"Chechenskaya Respublika",
				"Chelyabinskaya oblast'",
				"Chukotskiy avtonomnyy okrug",
				"Chuvashskaya Respublika",
				"Dagestan, Respublika",
				"Respublika Ingushetiya",
				"Irkutiskaya oblast'",
				"Ivanovskaya oblast'",
				"Kamchatskiy kray",
				"Kabardino-Balkarskaya Respublika",
				"Karachayevo-Cherkesskaya Respublika",
				"Krasnodarskiy kray",
				"Kemerovskaya oblast'",
				"Kaliningradskaya oblast'",
				"Kurganskaya oblast'",
				"Khabarovskiy kray",
				"Khanty-Mansiysky avtonomnyy okrug-Yugra",
				"Kirovskaya oblast'",
				"Khakasiya, Respublika",
				"Kalmykiya, Respublika",
				"Kaluzhskaya oblast'",
				"Komi, Respublika",
				"Kostromskaya oblast'",
				"Kareliya, Respublika",
				"Kurskaya oblast'",
				"Krasnoyarskiy kray",
				"Leningradskaya oblast'",
				"Lipetskaya oblast'",
				"Magadanskaya oblast'",
				"Mariy El, Respublika",
				"Mordoviya, Respublika",
				"Moskovskaya oblast'",
				"Moskva",
				"Murmanskaya oblast'",
				"Nenetskiy avtonomnyy okrug",
				"Novgorodskaya oblast'",
				"Nizhegorodskaya oblast'",
				"Novosibirskaya oblast'",
				"Omskaya oblast'",
				"Orenburgskaya oblast'",
				"Orlovskaya oblast'",
				"Permskiy kray",
				"Penzenskaya oblast'",
				"Primorskiy kray",
				"Pskovskaya oblast'",
				"Rostovskaya oblast'",
				"Ryazanskaya oblast'",
				"Sakha, Respublika [Yakutiya]",
				"Sakhalinskaya oblast'",
				"Samaraskaya oblast'",
				"Saratovskaya oblast'",
				"Severnaya Osetiya-Alaniya, Respublika",
				"Smolenskaya oblast'",
				"Sankt-Peterburg",
				"Stavropol'skiy kray",
				"Sverdlovskaya oblast'",
				"Tatarstan, Respublika",
				"Tambovskaya oblast'",
				"Tomskaya oblast'",
				"Tul'skaya oblast'",
				"Tverskaya oblast'",
				"Tyva, Respublika [Tuva]",
				"Tyumenskaya oblast'",
				"Udmurtskaya Respublika",
				"Ul'yanovskaya oblast'",
				"Volgogradskaya oblast'",
				"Vladimirskaya oblast'",
				"Vologodskaya oblast'",
				"Voronezhskaya oblast'",
				"Yamalo-Nenetskiy avtonomnyy okrug",
				"Yaroslavskaya oblast'",
				"Yevreyskaya avtonomnaya oblast'",
				"Zabajkal'skij kraj"
			]
		},
		{
			"country": "Rwanda",
			"states": [
				"Ville de Kigali",
				"Est",
				"Nord",
				"Ouest",
				"Sud"
			]
		},
		{
			"country": "Saudi Arabia",
			"states": [
				"Ar Riy?????",
				"Makkah",
				"Al Mad??nah",
				"Ash Sharq??yah",
				"Al Qa????m",
				"?????'il",
				"Tab??k",
				"Al ???ud??d ash Sham??liyah",
				"J??zan",
				"Najr??n",
				"Al B??hah",
				"Al Jawf",
				"`As??r"
			]
		},
		{
			"country": "Solomon Islands",
			"states": [
				"Central",
				"Choiseul",
				"Capital Territory (Honiara)",
				"Guadalcanal",
				"Isabel",
				"Makira",
				"Malaita",
				"Rennell and Bellona",
				"Temotu",
				"Western"
			]
		},
		{
			"country": "Seychelles",
			"states": [
				"Anse aux Pins",
				"Anse Boileau",
				"Anse Etoile",
				"Anse Louis",
				"Anse Royale",
				"Baie Lazare",
				"Baie Sainte Anne",
				"Beau Vallon",
				"Bel Air",
				"Bel Ombre",
				"Cascade",
				"Glacis",
				"Grand Anse Mahe",
				"Grand Anse Praslin",
				"La Digue",
				"English River",
				"Mont Buxton",
				"Mont Fleuri",
				"Plaisance",
				"Pointe Larue",
				"Port Glaud",
				"Saint Louis",
				"Takamaka",
				"Les Mamelles",
				"Roche Caiman"
			]
		},
		{
			"country": "Sudan",
			"states": [
				"Zalingei",
				"Sharq D??rf??r",
				"Sham??l D??rf??r",
				"Jan??b D??rf??r",
				"Gharb D??rf??r",
				"Al Qa?????rif",
				"Al Jaz??rah",
				"Kassal??",
				"Al Khar????m",
				"Sham??l Kurduf??n",
				"Jan??b Kurduf??n",
				"An N??l al Azraq",
				"Ash Sham??l??yah",
				"An N??l",
				"An N??l al Abya???",
				"Al Ba???r al A???mar",
				"Sinn??r"
			]
		},
		{
			"country": "Sweden",
			"states": [
				"Stockholms l??n",
				"V??sterbottens l??n",
				"Norrbottens l??n",
				"Uppsala l??n",
				"S??dermanlands l??n",
				"??sterg??tlands l??n",
				"J??nk??pings l??n",
				"Kronobergs l??n",
				"Kalmar l??n",
				"Gotlands l??n",
				"Blekinge l??n",
				"Sk??ne l??n",
				"Hallands l??n",
				"V??stra G??talands l??n",
				"V??rmlands l??n",
				"??rebro l??n",
				"V??stmanlands l??n",
				"Dalarnas l??n",
				"G??vleborgs l??n",
				"V??sternorrlands l??n",
				"J??mtlands l??n"
			]
		},
		{
			"country": "Singapore",
			"states": [
				"Central Singapore",
				"North East",
				"North West",
				"South East",
				"South West"
			]
		},
		{
			"country": "Saint Helena, Ascension and Tristan da Cunha",
			"states": [
				"Ascension",
				"Saint Helena",
				"Tristan da Cunha"
			]
		},
		{
			"country": "Slovenia",
			"states": [
				"Ajdov????ina",
				"Beltinci",
				"Bled",
				"Bohinj",
				"Borovnica",
				"Bovec",
				"Brda",
				"Brezovica",
				"Bre??ice",
				"Ti??ina",
				"Celje",
				"Cerklje na Gorenjskem",
				"Cerknica",
				"Cerkno",
				"??ren??ovci",
				"??rna na Koro??kem",
				"??rnomelj",
				"Destrnik",
				"Diva??a",
				"Dobrepolje",
				"Dobrova-Polhov Gradec",
				"Dol pri Ljubljani",
				"Dom??ale",
				"Dornava",
				"Dravograd",
				"Duplek",
				"Gorenja vas-Poljane",
				"Gori??nica",
				"Gornja Radgona",
				"Gornji Grad",
				"Gornji Petrovci",
				"Grosuplje",
				"??alovci",
				"Hrastnik",
				"Hrpelje-Kozina",
				"Idrija",
				"Ig",
				"Ilirska Bistrica",
				"Ivan??na Gorica",
				"Izola/Isola",
				"Jesenice",
				"Jur??inci",
				"Kamnik",
				"Kanal",
				"Kidri??evo",
				"Kobarid",
				"Kobilje",
				"Ko??evje",
				"Komen",
				"Koper/Capodistria",
				"Kozje",
				"Kranj",
				"Kranjska Gora",
				"Kr??ko",
				"Kungota",
				"Kuzma",
				"La??ko",
				"Lenart",
				"Lendava/Lendva",
				"Litija",
				"Ljubljana",
				"Ljubno",
				"Ljutomer",
				"Logatec",
				"Lo??ka dolina",
				"Lo??ki Potok",
				"Lu??e",
				"Lukovica",
				"Maj??perk",
				"Maribor",
				"Medvode",
				"Menge??",
				"Metlika",
				"Me??ica",
				"Miren-Kostanjevica",
				"Mislinja",
				"Morav??e",
				"Moravske Toplice",
				"Mozirje",
				"Murska Sobota",
				"Muta",
				"Naklo",
				"Nazarje",
				"Nova Gorica",
				"Novo mesto",
				"Odranci",
				"Ormo??",
				"Osilnica",
				"Pesnica",
				"Piran/Pirano",
				"Pivka",
				"Pod??etrtek",
				"Podvelka",
				"Postojna",
				"Preddvor",
				"Ptuj",
				"Puconci",
				"Ra??e-Fram",
				"Rade??e",
				"Radenci",
				"Radlje ob Dravi",
				"Radovljica",
				"Ravne na Koro??kem",
				"Ribnica",
				"Roga??ovci",
				"Roga??ka Slatina",
				"Rogatec",
				"Ru??e",
				"Semi??",
				"Sevnica",
				"Se??ana",
				"Slovenj Gradec",
				"Slovenska Bistrica",
				"Slovenske Konjice",
				"Star??e",
				"Sveti Jurij",
				"??en??ur",
				"??entilj",
				"??entjernej",
				"??entjur",
				"??kocjan",
				"??kofja Loka",
				"??kofljica",
				"??marje pri Jel??ah",
				"??martno ob Paki",
				"??o??tanj",
				"??tore",
				"Tolmin",
				"Trbovlje",
				"Trebnje",
				"Tr??i??",
				"Turni????e",
				"Velenje",
				"Velike La????e",
				"Videm",
				"Vipava",
				"Vitanje",
				"Vodice",
				"Vojnik",
				"Vrhnika",
				"Vuzenica",
				"Zagorje ob Savi",
				"Zavr??",
				"Zre??e",
				"??elezniki",
				"??iri",
				"Benedikt",
				"Bistrica ob Sotli",
				"Bloke",
				"Braslov??e",
				"Cankova",
				"Cerkvenjak",
				"Dobje",
				"Dobrna",
				"Dobrovnik/Dobronak",
				"Dolenjske Toplice",
				"Grad",
				"Hajdina",
				"Ho??e-Slivnica",
				"Hodo??/Hodos",
				"Horjul",
				"Jezersko",
				"Komenda",
				"Kostel",
				"Kri??evci",
				"Lovrenc na Pohorju",
				"Markovci",
				"Miklav?? na Dravskem polju",
				"Mirna Pe??",
				"Oplotnica",
				"Podlehnik",
				"Polzela",
				"Prebold",
				"Prevalje",
				"Razkri??je",
				"Ribnica na Pohorju",
				"Selnica ob Dravi",
				"Sodra??ica",
				"Sol??ava",
				"Sveta Ana",
				"Sveta Andra?? v Slovenskih Goricah",
				"??empeter-Vrtojba",
				"Tabor",
				"Trnovska vas",
				"Trzin",
				"Velika Polana",
				"Ver??ej",
				"Vransko",
				"??alec",
				"??etale",
				"??irovnica",
				"??u??emberk",
				"??martno pri Litiji",
				"Apa??e",
				"Cirkulane",
				"Kosanjevica na Krki",
				"Makole",
				"Mokronog-Trebelno",
				"Polj??ane",
				"Ren??e-Vogrsko",
				"Sredi????e ob Dravi",
				"Stra??a",
				"Sveta Trojica v Slovenskih Goricah",
				"Sveti Toma??",
				"??marjeske Topli??e",
				"Gorje",
				"Log-Dragomer",
				"Re??ica ob Savinji",
				"Sveti Jurij v Slovenskih Goricah",
				"??entrupert"
			]
		},
		{
			"country": "Svalbard and Jan Mayen",
			"states": []
		},
		{
			"country": "Slovakia",
			"states": [
				"Banskobystrick?? kraj",
				"Bratislavsk?? kraj",
				"Ko??ick?? kraj",
				"Nitriansky kraj",
				"Pre??ovsk?? kraj",
				"Trnavsk?? kraj",
				"Tren??iansky kraj",
				"??ilinsk?? kraj"
			]
		},
		{
			"country": "Sierra Leone",
			"states": [
				"Eastern",
				"Northern",
				"Southern (Sierra Leone)",
				"Western Area (Freetown)"
			]
		},
		{
			"country": "San Marino",
			"states": [
				"Acquaviva",
				"Chiesanuova",
				"Domagnano",
				"Faetano",
				"Fiorentino",
				"Borgo Maggiore",
				"San Marino",
				"Montegiardino",
				"Serravalle"
			]
		},
		{
			"country": "Senegal",
			"states": [
				"Diourbel",
				"Dakar",
				"Fatick",
				"Kaffrine",
				"Kolda",
				"K??dougou",
				"Kaolack",
				"Louga",
				"Matam",
				"S??dhiou",
				"Saint-Louis",
				"Tambacounda",
				"Thi??s",
				"Ziguinchor"
			]
		},
		{
			"country": "Somalia",
			"states": [
				"Awdal",
				"Bakool",
				"Banaadir",
				"Bari",
				"Bay",
				"Galguduud",
				"Gedo",
				"Hiirsan",
				"Jubbada Dhexe",
				"Jubbada Hoose",
				"Mudug",
				"Nugaal",
				"Saneag",
				"Shabeellaha Dhexe",
				"Shabeellaha Hoose",
				"Sool",
				"Togdheer",
				"Woqooyi Galbeed"
			]
		},
		{
			"country": "Suriname",
			"states": [
				"Brokopondo",
				"Commewijne",
				"Coronie",
				"Marowijne",
				"Nickerie",
				"Paramaribo",
				"Para",
				"Saramacca",
				"Sipaliwini",
				"Wanica"
			]
		},
		{
			"country": "South Sudan",
			"states": [
				"Northern Bahr el-Ghazal",
				"Western Bahr el-Ghazal",
				"Central Equatoria",
				"Eastern Equatoria",
				"Western Equatoria",
				"Jonglei",
				"Lakes",
				"Upper Nile",
				"Unity",
				"Warrap"
			]
		},
		{
			"country": "Sao Tome and Principe",
			"states": [
				"Pr??ncipe",
				"S??o Tom??"
			]
		},
		{
			"country": "El Salvador",
			"states": [
				"Ahuachap??n",
				"Caba??as",
				"Chalatenango",
				"Cuscatl??n",
				"La Libertad",
				"Moraz??n",
				"La Paz",
				"Santa Ana",
				"San Miguel",
				"Sonsonate",
				"San Salvador",
				"San Vicente",
				"La Uni??n",
				"Usulut??n"
			]
		},
		{
			"country": "Sint Maarten (Dutch part)",
			"states": []
		},
		{
			"country": "Syrian Arab Republic",
			"states": [
				"Dimashq",
				"Dar'a",
				"Dayr az Zawr",
				"Al Hasakah",
				"Homs",
				"Halab",
				"Hamah",
				"Idlib",
				"Al Ladhiqiyah",
				"Al Qunaytirah",
				"Ar Raqqah",
				"Rif Dimashq",
				"As Suwayda'",
				"Tartus"
			]
		},
		{
			"country": "Swaziland",
			"states": [
				"Hhohho",
				"Lubombo",
				"Manzini",
				"Shiselweni"
			]
		},
		{
			"country": "Turks and Caicos Islands",
			"states": []
		},
		{
			"country": "Chad",
			"states": [
				"Al Ba??????ah",
				"Ba???r al Ghaz??l",
				"B??rk??",
				"Sh??r?? B??qirm??",
				"Inn??d??",
				"Q??r??",
				"???ajjar Lam??s",
				"K??nim",
				"Al Bu???ayrah",
				"L??q??n al Gharb??",
				"L??q??n ash Sharq??",
				"M??nd??l",
				"Sh??r?? al Awsa???",
				"M??y?? K??bb?? ash Sharq??",
				"M??y?? K??bb?? al Gharb??",
				"Mad??nat Injam??n??",
				"Wadd??y",
				"Sal??m??t",
				"S??l??",
				"T??njil??",
				"Tibast??",
				"W??d?? F??r??"
			]
		},
		{
			"country": "French Southern Territories",
			"states": []
		},
		{
			"country": "Togo",
			"states": [
				"R??gion du Centre",
				"R??gion de la Kara",
				"R??gion Maritime",
				"R??gion des Plateaux",
				"R??gion des Savannes"
			]
		},
		{
			"country": "Thailand",
			"states": [
				"Krung Thep Maha Nakhon Bangkok",
				"Samut Prakan",
				"Nonthaburi",
				"Pathum Thani",
				"Phra Nakhon Si Ayutthaya",
				"Ang Thong",
				"Lop Buri",
				"Sing Buri",
				"Chai Nat",
				"Saraburi",
				"Chon Buri",
				"Rayong",
				"Chanthaburi",
				"Trat",
				"Chachoengsao",
				"Prachin Buri",
				"Nakhon Nayok",
				"Sa Kaeo",
				"Nakhon Ratchasima",
				"Buri Ram",
				"Surin",
				"Si Sa Ket",
				"Ubon Ratchathani",
				"Yasothon",
				"Chaiyaphum",
				"Amnat Charoen",
				"Nong Bua Lam Phu",
				"Khon Kaen",
				"Udon Thani",
				"Loei",
				"Nong Khai",
				"Maha Sarakham",
				"Roi Et",
				"Kalasin",
				"Sakon Nakhon",
				"Nakhon Phanom",
				"Mukdahan",
				"Chiang Mai",
				"Lamphun",
				"Lampang",
				"Uttaradit",
				"Phrae",
				"Nan",
				"Phayao",
				"Chiang Rai",
				"Mae Hong Son",
				"Nakhon Sawan",
				"Uthai Thani",
				"Kamphaeng Phet",
				"Tak",
				"Sukhothai",
				"Phitsanulok",
				"Phichit",
				"Phetchabun",
				"Ratchaburi",
				"Kanchanaburi",
				"Suphan Buri",
				"Nakhon Pathom",
				"Samut Sakhon",
				"Samut Songkhram",
				"Phetchaburi",
				"Prachuap Khiri Khan",
				"Nakhon Si Thammarat",
				"Krabi",
				"Phangnga",
				"Phuket",
				"Surat Thani",
				"Ranong",
				"Chumphon",
				"Songkhla",
				"Satun",
				"Trang",
				"Phatthalung",
				"Pattani",
				"Yala",
				"Narathiwat",
				"Phatthaya"
			]
		},
		{
			"country": "Tajikistan",
			"states": [
				"Gorno-Badakhshan",
				"Khatlon",
				"Sughd"
			]
		},
		{
			"country": "Tokelau",
			"states": []
		},
		{
			"country": "Timor-Leste",
			"states": [
				"Aileu",
				"Ainaro",
				"Baucau",
				"Bobonaro",
				"Cova Lima",
				"D??li",
				"Ermera",
				"Lautem",
				"Liqui??a",
				"Manufahi",
				"Manatuto",
				"Oecussi",
				"Viqueque"
			]
		},
		{
			"country": "Turkmenistan",
			"states": [
				"Ahal",
				"Balkan",
				"Da??oguz",
				"Lebap",
				"Mary",
				"A??gabat"
			]
		},
		{
			"country": "Tunisia",
			"states": [
				"Tunis",
				"Ariana",
				"Ben Arous",
				"La Manouba",
				"Nabeul",
				"Zaghouan",
				"Bizerte",
				"B??ja",
				"Jendouba",
				"Le Kef",
				"Siliana",
				"Kairouan",
				"Kasserine",
				"Sidi Bouzid",
				"Sousse",
				"Monastir",
				"Mahdia",
				"Sfax",
				"Gafsa",
				"Tozeur",
				"Kebili",
				"Gab??s",
				"Medenine",
				"Tataouine"
			]
		},
		{
			"country": "Tonga",
			"states": [
				"'Eua",
				"Ha'apai",
				"Niuas",
				"Tongatapu",
				"Vava'u"
			]
		},
		{
			"country": "Turkey",
			"states": [
				"Adana",
				"Ad??yaman",
				"Afyonkarahisar",
				"A??r??",
				"Amasya",
				"Ankara",
				"Antalya",
				"Artvin",
				"Ayd??n",
				"Bal??kesir",
				"Bilecik",
				"Bing??l",
				"Bitlis",
				"Bolu",
				"Burdur",
				"Bursa",
				"??anakkale",
				"??ank??r??",
				"??orum",
				"Denizli",
				"Diyarbak??r",
				"Edirne",
				"Elaz????",
				"Erzincan",
				"Erzurum",
				"Eski??ehir",
				"Gaziantep",
				"Giresun",
				"G??m????hane",
				"Hakk??ri",
				"Hatay",
				"Isparta",
				"Mersin",
				"??stanbul",
				"??zmir",
				"Kars",
				"Kastamonu",
				"Kayseri",
				"K??rklareli",
				"K??r??ehir",
				"Kocaeli",
				"Konya",
				"K??tahya",
				"Malatya",
				"Manisa",
				"Kahramanmara??",
				"Mardin",
				"Mu??la",
				"Mu??",
				"Nev??ehir",
				"Ni??de",
				"Ordu",
				"Rize",
				"Sakarya",
				"Samsun",
				"Siirt",
				"Sinop",
				"Sivas",
				"Tekirda??",
				"Tokat",
				"Trabzon",
				"Tunceli",
				"??anl??urfa",
				"U??ak",
				"Van",
				"Yozgat",
				"Zonguldak",
				"Aksaray",
				"Bayburt",
				"Karaman",
				"K??r??kkale",
				"Batman",
				"????rnak",
				"Bart??n",
				"Ardahan",
				"I??d??r",
				"Yalova",
				"Karab??k",
				"Kilis",
				"Osmaniye",
				"D??zce"
			]
		},
		{
			"country": "Trinidad and Tobago",
			"states": [
				"Arima",
				"Chaguanas",
				"Couva-Tabaquite-Talparo",
				"Diego Martin",
				"Eastern Tobago",
				"Penal-Debe",
				"Port of Spain",
				"Princes Town",
				"Point Fortin",
				"Rio Claro-Mayaro",
				"San Fernando",
				"Sangre Grande",
				"Siparia",
				"San Juan-Laventille",
				"Tunapuna-Piarco",
				"Western Tobago"
			]
		},
		{
			"country": "Tuvalu",
			"states": [
				"Funafuti",
				"Niutao",
				"Nukufetau",
				"Nukulaelae",
				"Nanumea",
				"Nanumanga",
				"Nui",
				"Vaitupu"
			]
		},
		{
			"country": "Taiwan",
			"states": [
				"Changhua",
				"Chiay City",
				"Chiayi",
				"Hsinchu",
				"Hsinchui City",
				"Hualien",
				"Ilan",
				"Keelung City",
				"Kaohsiung City",
				"Kaohsiung",
				"Miaoli",
				"Nantou",
				"Penghu",
				"Pingtung",
				"Taoyuan",
				"Tainan City",
				"Tainan",
				"Taipei City",
				"Taipei",
				"Taitung",
				"Taichung City",
				"Taichung",
				"Yunlin"
			]
		},
		{
			"country": "Tanzania, United Republic of",
			"states": [
				"Arusha",
				"Dar-es-Salaam",
				"Dodoma",
				"Iringa",
				"Kagera",
				"Kaskazini Pemba",
				"Kaskazini Unguja",
				"Kigoma",
				"Kilimanjaro",
				"Kusini Pemba",
				"Kusini Unguja",
				"Lindi",
				"Mara",
				"Mbeya",
				"Mjini Magharibi",
				"Morogoro",
				"Mtwara",
				"Mwanza",
				"Pwani",
				"Rukwa",
				"Ruvuma",
				"Shinyanga",
				"Singida",
				"Tabora",
				"Tanga",
				"Manyara"
			]
		},
		{
			"country": "Ukraine",
			"states": [
				"Vinnyts'ka Oblast'",
				"Volyns'ka Oblast'",
				"Luhans'ka Oblast'",
				"Dnipropetrovs'ka Oblast'",
				"Donets'ka Oblast'",
				"Zhytomyrs'ka Oblast'",
				"Zakarpats'ka Oblast'",
				"Zaporiz'ka Oblast'",
				"Ivano-Frankivs'ka Oblast'",
				"Ky??vs'ka mis'ka rada",
				"Ky??vs'ka Oblast'",
				"Kirovohrads'ka Oblast'",
				"Sevastopol",
				"Respublika Krym",
				"L'vivs'ka Oblast'",
				"Mykola??vs'ka Oblast'",
				"Odes'ka Oblast'",
				"Poltavs'ka Oblast'",
				"Rivnens'ka Oblast'",
				"Sums 'ka Oblast'",
				"Ternopil's'ka Oblast'",
				"Kharkivs'ka Oblast'",
				"Khersons'ka Oblast'",
				"Khmel'nyts'ka Oblast'",
				"Cherkas'ka Oblast'",
				"Chernihivs'ka Oblast'",
				"Chernivets'ka Oblast'"
			]
		},
		{
			"country": "Uganda",
			"states": [
				"Central",
				"Eastern",
				"Northern",
				"Western"
			]
		},
		{
			"country": "United States Minor Outlying Islands",
			"states": [
				"Johnston Atoll",
				"Midway Islands",
				"Navassa Island",
				"Wake Island",
				"Baker Island",
				"Howland Island",
				"Jarvis Island",
				"Kingman Reef",
				"Palmyra Atoll"
			]
		},
		{
			"country": "United States",
			"states": [
				"Alaska",
				"Alabama",
				"Arkansas",
				"American Samoa",
				"Arizona",
				"California",
				"Colorado",
				"Connecticut",
				"District of Columbia",
				"Delaware",
				"Florida",
				"Georgia",
				"Guam",
				"Hawaii",
				"Iowa",
				"Idaho",
				"Illinois",
				"Indiana",
				"Kansas",
				"Kentucky",
				"Louisiana",
				"Massachusetts",
				"Maryland",
				"Maine",
				"Michigan",
				"Minnesota",
				"Missouri",
				"Northern Mariana Islands",
				"Mississippi",
				"Montana",
				"North Carolina",
				"North Dakota",
				"Nebraska",
				"New Hampshire",
				"New Jersey",
				"New Mexico",
				"Nevada",
				"New York",
				"Ohio",
				"Oklahoma",
				"Oregon",
				"Pennsylvania",
				"Puerto Rico",
				"Rhode Island",
				"South Carolina",
				"South Dakota",
				"Tennessee",
				"Texas",
				"United States Minor Outlying Islands",
				"Utah",
				"Virginia",
				"Virgin Islands",
				"Vermont",
				"Washington",
				"Wisconsin",
				"West Virginia",
				"Wyoming",
				"Armed Forces Americas (except Canada)",
				"Armed Forces Africa, Canada, Europe, Middle East",
				"Armed Forces Pacific"
			]
		},
		{
			"country": "Uruguay",
			"states": [
				"Artigas",
				"Canelones",
				"Cerro Largo",
				"Colonia",
				"Durazno",
				"Florida",
				"Flores",
				"Lavalleja",
				"Maldonado",
				"Montevideo",
				"Paysand??",
				"R??o Negro",
				"Rocha",
				"Rivera",
				"Salto",
				"San Jos??",
				"Soriano",
				"Tacuaremb??",
				"Treinta y Tres"
			]
		},
		{
			"country": "Uzbekistan",
			"states": [
				"Andijon",
				"Buxoro",
				"Farg'ona",
				"Jizzax",
				"Namangan",
				"Navoiy",
				"Qashqadaryo",
				"Qoraqalpog'iston Respublikasi",
				"Samarqand",
				"Sirdaryo",
				"Surxondaryo",
				"Toshkent",
				"Toshkent",
				"Xorazm"
			]
		},
		{
			"country": "Holy See (Vatican City State)",
			"states": []
		},
		{
			"country": "Saint Vincent and the Grenadines",
			"states": [
				"Charlotte",
				"Saint Andrew",
				"Saint David",
				"Saint George",
				"Saint Patrick",
				"Grenadines"
			]
		},
		{
			"country": "Venezuela, Bolivarian Republic of",
			"states": [
				"Distrito Federal",
				"Anzo??tegui",
				"Apure",
				"Aragua",
				"Barinas",
				"Bol??var",
				"Carabobo",
				"Cojedes",
				"Falc??n",
				"Gu??rico",
				"Lara",
				"M??rida",
				"Miranda",
				"Monagas",
				"Nueva Esparta",
				"Portuguesa",
				"Sucre",
				"T??chira",
				"Trujillo",
				"Yaracuy",
				"Zulia",
				"Dependencias Federales",
				"Vargas",
				"Delta Amacuro",
				"Amazonas"
			]
		},
		{
			"country": "Virgin Islands, British",
			"states": []
		},
		{
			"country": "Virgin Islands, U.S.",
			"states": []
		},
		{
			"country": "Vietnam",
			"states": [
				"Lai Ch??u",
				"L??o Cai",
				"H?? Giang",
				"Cao B???ng",
				"S??n La",
				"Y??n B??i",
				"Tuy??n Quang",
				"L???ng S??n",
				"Qu???ng Ninh",
				"Ho?? B??nh",
				"H?? T??y",
				"Ninh B??nh",
				"Th??i B??nh",
				"Thanh H??a",
				"Ngh??? An",
				"H?? T???nh",
				"Qu???ng B??nh",
				"Qu???ng Tr???",
				"Th???a Thi??n-Hu???",
				"Qu???ng Nam",
				"Kon Tum",
				"Qu???ng Ng??i",
				"Gia Lai",
				"B??nh ?????nh",
				"Ph?? Y??n",
				"?????c L???k",
				"Kh??nh H??a",
				"L??m ?????ng",
				"Ninh Thu???n",
				"T??y Ninh",
				"?????ng Nai",
				"B??nh Thu???n",
				"Long An",
				"B?? R???a-V??ng T??u",
				"An Giang",
				"?????ng Th??p",
				"Ti???n Giang",
				"Ki??n Giang",
				"V??nh Long",
				"B???n Tre",
				"Tr?? Vinh",
				"S??c Tr??ng",
				"B???c K???n",
				"B???c Giang",
				"B???c Li??u",
				"B???c Ninh",
				"B??nh D????ng",
				"B??nh Ph?????c",
				"C?? Mau",
				"H???i Duong",
				"H?? Nam",
				"H??ng Y??n",
				"Nam ?????nh",
				"Ph?? Th???",
				"Th??i Nguy??n",
				"V??nh Ph??c",
				"??i???n Bi??n",
				"?????k N??ng",
				"H???u Giang",
				"C???n Th??",
				"???? N???ng",
				"H?? N???i",
				"H???i Ph??ng",
				"H??? Ch?? Minh [S??i G??n]"
			]
		},
		{
			"country": "Vanuatu",
			"states": [
				"Malampa",
				"P??nama",
				"Sanma",
				"Sh??fa",
				"Taf??a",
				"Torba"
			]
		},
		{
			"country": "Wallis and Futuna",
			"states": []
		},
		{
			"country": "Samoa",
			"states": [
				"A'ana",
				"Aiga-i-le-Tai",
				"Atua",
				"Fa'asaleleaga",
				"Gaga'emauga",
				"Gagaifomauga",
				"Palauli",
				"Satupa'itea",
				"Tuamasaga",
				"Va'a-o-Fonoti",
				"Vaisigano"
			]
		},
		{
			"country": "Yemen",
			"states": [
				"Aby??n",
				"'Adan",
				"'Amr??n",
				"Al Bay?????'",
				"A??? ?????li???",
				"Dham??r",
				"???a???ramawt",
				"???ajjah",
				"Ibb",
				"Al Jawf",
				"La???ij",
				"Ma'rib",
				"Al Mahrah",
				"Al ???udaydah",
				"Al Ma???w??t",
				"Raymah",
				"??a'dah",
				"Shabwah",
				"??an'??'",
				"T??'izz"
			]
		},
		{
			"country": "Mayotte",
			"states": []
		},
		{
			"country": "South Africa",
			"states": [
				"Eastern Cape",
				"Free State",
				"Gauteng",
				"Limpopo",
				"Mpumalanga",
				"Northern Cape",
				"North-West (South Africa)",
				"Western Cape",
				"Kwazulu-Natal"
			]
		},
		{
			"country": "Zambia",
			"states": [
				"Western",
				"Central",
				"Eastern",
				"Luapula",
				"Northern",
				"North-Western",
				"Southern (Zambia)",
				"Copperbelt",
				"Lusaka"
			]
		},
		{
			"country": "Zimbabwe",
			"states": [
				"Bulawayo",
				"Harare",
				"Manicaland",
				"Mashonaland Central",
				"Mashonaland East",
				"Midlands",
				"Matabeleland North",
				"Matabeleland South",
				"Masvingo",
				"Mashonaland West"
			]
		}
	];

	function getStateList(country) {
		for (var i = 0; i < countrywisestatelist.length; i++) {
			if (countrywisestatelist[i].country == country) {
				return countrywisestatelist[i].states;
			}
		}
	}

	function loadCountrySelectItems() {
		var countryElem = document.getElementById("country");
		for (var i = 0; i < countrywisestatelist.length; i++) {
			var option = document.createElement("option");
			option.value = countrywisestatelist[i].country;
			option.text = countrywisestatelist[i].country;
			countryElem.appendChild(option);
		}
	}

	function removeOptions(selectElement) {
		var i, L = selectElement.options.length - 1;
		for (i = L; i >= 1; i--) {
			selectElement.remove(i);
		}
	}

	function loadStatesSelectItems() {
		var countryElem = document.getElementById("country");
		var country = countryElem.options[countryElem.selectedIndex].text;
		var stateElem = document.getElementById('state_or_province');
		removeOptions(stateElem);
		if (country) {
			var stateList = getStateList(country);
			for (var i = 0; i < stateList.length; i++) {
				var option = document.createElement("option");
				option.value = stateList[i];
				option.text = stateList[i];
				stateElem.appendChild(option);
			}
		}
	}

	function getInfo() {

		var companyinfo = {};
		projectinfo.id = document.getElementById("id").value;
		projectinfo.name = document.getElementById("name").value;
		projectinfo.start_date = document.getElementById("start_date").value;
		projectinfo.end_date = document.getElementById("end_date").value;
		projectinfo.project_type = document.getElementById("project_type").value;
		projectinfo.value = document.getElementById("value").value;
		projectinfo.currency = document.getElementById("currency").value;
		// projectinfo.status = document.getElementById("status").value;
		projectinfo.job_number = document.getElementById("job_number").value;
		projectinfo.address_line_1 = document.getElementById("address_line_1").value;
		projectinfo.address_line_2 = document.getElementById("address_line_2").value;
		projectinfo.city = document.getElementById("city").value;
		projectinfo.state_or_province = document.getElementById("state_or_province").value;
		projectinfo.postal_code = document.getElementById("postal_code").value;
		projectinfo.country = document.getElementById("country").value;
		// projectinfo.business_unit_id = document.getElementById("business_unit_id").value;
		projectinfo.timezone = document.getElementById("timezone").value;
		projectinfo.language = document.getElementById("language").value;
		projectinfo.construction_type = document.getElementById("construction_type").value;
		projectinfo.contract_type = document.getElementById("contract_type").value;
		// projectinfo.last_sign_in = document.getElementById("last_sign_in").value;
		// projectinfo.copy_project_job_id = document.getElementById("copy_project_job_id").value;
		// projectinfo.created_at = document.getElementById("created_at").value;
		// projectinfo.updated_at = document.getElementById("updated_at").value;
		// projectinfo.service_types = document.getElementById("service_types").value;
		// projectinfo.template_project_id = document.getElementById("template_project_id").value;
		// projectinfo.include_companies = document.getElementById("include_companies").value;
		// projectinfo.include_locations = document.getElementById("include_locations").value;

		return projectinfo;
	}

	var saveInProgress = false;
	var isValid = true;

	function validate(info) {
		var valid = true;

		return valid;
	}

	function save() {
		if (saveInProgress) return;
		saveInProgress = true;
		var info = getInfo();

		// vaidate project
		isValid = validate(info);
		if (!isValid) {
			saveInProgress = false;
			return;
		}

		var formElem = document.getElementById('companyform');

		var data = new FormData(formElem);
		data.append('_token', '{{csrf_token()}}');
		// Save project
		$.ajax({
			url: "{{ route('/bim360/companies/save') }}",
			type: 'post',
			data: data,
			contentType: false,
			processData: false,
			success: function(response) {
				if (response.data) {
					fillResponseData(response.data);
				}
				saveInProgress = false;
			},
		});
	}
</script>
<div class="p-0">
	<div class="p-0">
		<div class="row justify-content-between bg-primary p-1 text-gray-900">
			<span class="form-text"></span>
			<h2 class="lblEnquiry p-2" id="lblTitle">New Company</h2>
			<span id="spnClose" class="form-text mr-5"><i class="flaticon-circle icon-2x text-danger"></i></span>
		</div>

		<div class="pt-0">
			<div class="row justify-content-center my-10 px-8 my-lg-10 px-lg-10">
				<div class="col-xl-12 col-xl-7">
					<form class="form" id="companyform" enctype="multipart/form-data">
						<input type="hidden" id="id" name="id" value="" />
						<div class="pb-0" data-wizard-type="step-content" data-wizard-state="current">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>Company Name<span class="text-danger">*</span></label>
										<input readonly="readonly" type="text" id="name" name="name" placeholder="Company Name" class="form-control form-control-solid form-control-lg" value="" />
										<span class="form-text text-muted"></span>
									</div>

									<div class="form-group">
										<label>Description<span class="text-danger">*</span></label>
										<input readonly="readonly" type="text" id="description" name="description" placeholder="Company Name" class="form-control form-control-solid form-control-lg" value="" />
										<span class="form-text text-muted"></span>
									</div>

									<div class="form-group">
										<label>Trade<span class="text-danger">*</span></label>
										<select disabled="disabled" name="trade" id="trade" class="form-control form-control-solid form-control-lg">
											<option value="">Trade</option>
											<?php
											foreach ($trade as $key => $value) {
												echo '<option value="' . strtolower($value) . '">' . $value . '</option>';
											}
											?>
										</select>
										<span class="form-text text-muted"></span>
									</div>

									<div class="form-group">
										<label>ERP Id<span class="text-danger">*</span></label>
										<input readonly="readonly" type="text" id="erp_id" name="erp_id" placeholder="ERP Id" class="form-control form-control-solid form-control-lg" value="" />
										<span class="form-text text-muted"></span>
									</div>
									<div class="form-group">
										<label>Tax Id<span class="text-danger">*</span></label>
										<input readonly="readonly" type="text" id="tax_id" name="tax_id" placeholder="Tax Id" class="form-control form-control-solid form-control-lg" value="" />
										<span class="form-text text-muted"></span>
									</div>

									<div class="form-group">
										<label>Phone<span class="text-danger">*</span></label>
										<input readonly="readonly" type="text" id="phone" name="phone" class="form-control form-control-solid form-control-lg" placeholder="Phone" value="" />
										<span class="form-text text-muted"></span>
									</div>

									<div class="form-group">
										<label>Website URL<span class="text-danger">*</span></label>
										<input readonly="readonly" type="text" id="website_url" name="website_url" class="form-control form-control-solid form-control-lg" placeholder="Website URL" value="" />
										<span class="form-text text-muted"></span>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Project Image<span class="text-danger">*</span></label>
										<div>
											<img id="imgImage" alt="Project Image" class="img-fluid" src="" width="50" />
										</div>
										<span class="form-text text-muted"></span>
									</div>

									<div class="form-group">
										<label>Address Line 1<span class="text-danger">*</span></label>
										<input readonly="readonly" type="text" id="address_line_1" name="address_line_1" class="form-control form-control-solid form-control-lg" placeholder="Address Line 1" value="" />
										<span class="form-text text-muted"></span>
									</div>
									<div class="form-group">
										<label>Address Line 2<span class="text-danger">*</span></label>
										<input readonly="readonly" type="text" id="address_line_2" name="address_line_2" class="form-control form-control-solid form-control-lg" placeholder="Address Line 2" value="" />
										<span class="form-text text-muted"></span>
									</div>
									<div class="row">
										<div class="col">
											<div class="form-group">
												<label>City<span class="text-danger">*</span></label>
												<input readonly="readonly" type="text" id="city" name="city" class="form-control form-control-solid form-control-lg" placeholder="City" value="" />
												<span class="form-text text-muted"></span>
											</div>
										</div>
										<div class="col">
											<div class="form-group">
												<label>Postal Code<span class="text-danger">*</span></label>
												<input readonly="readonly" type="text" id="postal_code" name="postal_code" class="form-control form-control-solid form-control-lg" placeholder="Postal Code" value="" />
												<span class="form-text text-muted"></span>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label>State<span class="text-danger">*</span></label>
										<select disabled="disabled" id="state_or_province" name="state_or_province" class="form-control form-control-solid form-control-lg">
											<option value="">State / Province</option>
										</select>
										<span class="form-text text-muted"></span>
									</div>
									<div class="form-group">
										<label>Country<span class="text-danger">*</span></label>
										<select disabled="disabled" name="country" id="country" onchange="loadStatesSelectItems();" class="form-control form-control-solid form-control-lg">
											<option value="">Country</option>
										</select>
										<span class="form-text text-muted"></span>
									</div>

								</div>
							</div>
						</div>

						<div class="d-flex justify-content-between border-top mt-5 pt-10">
							<!-- <div class="mr-2">
								<button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Cancel</button>
							</div> -->
							<!-- <div>
								<button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" onclick="save();">Save</button>
							</div> -->
							<a href="{{ route('/bim360/companies/edit').'?id='.$data->id }}" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4">Edit</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

{{-- Styles Section --}}
@section('styles')
<link href="{{ asset('/css/pages/wizard/wizard.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/dropzone.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/basic.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/plugins/custom/kanban/kanban.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/aecprefab.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/nptable.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

<style>
	.wizard-label h3 {
		width: 120px !important;
	}


	#tooltip1 {
		position: absolute;
		left: 400px;
		top: 300px;
		min-width: 100px;
		min-height: 32px;
		text-align: center;
		padding: 2px 4px;
		font-family: monospace;
		font-size: 14px !important;
		font-weight: bold;
		color: #3699FF;
		background: rgba(255, 255, 255, 0.8);
		display: block;

		border: 1px solid black;
		box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.5);
		transition: opacity 0.25s linear;
		border-radius: 3px;
		z-index: 1000;
		background-size: contain;
	}

	.lblEnquiry {
		color: #ffffff;
		font-size: 18px !important;
		font-weight: semi-bold;
	}

	body {
		background-color: #ffffff;
	}


	canvas {
		outline: none;
		-webkit-tap-highlight-color: rgba(255, 255, 255, 0);
		/* mobile webkit */
	}

	.tt1 {
		font-family: monospace;
		font-size: 13px !important;
		font-weight: bold;
		color: #3699FF;
	}

	.tt2 {
		font-family: monospace;
		font-size: 14px !important;
		font-weight: bold;
		color: #2555FF;
	}

	.modal-dialog1 {
		width: 1600px !important;
		height: 100%;
		margin: 0;
		padding: 0;
		margin-left: 50px;
	}

	.modal-content1 {
		width: 1600px !important;
		height: auto;
		min-height: 100%;
		border-radius: 0;
	}

	.modal-body1 {
		width: 1400px !important;
	}

	.modal-footer1 {
		width: 1400px !important;
	}

	#kt_content {
		padding: 0px !important;
	}

	#additionInfoDiv {
		height: 100px !important;
	}

	#spnClose {
		cursor: pointer;
	}

	#file1 {
		background-color: #EEE;
		border: #999 5px dashed;
		width: 100%;
		height: 200px;
		padding: 8px;
		font-size: 18px;
	}

	.mydatatable,
	.mydatatable th,
	.mydatatable td {
		border: 1px solid #FFFFFF;
	}

	.mydatatable th,
	mydatatable td {
		width: 300px;
	}

	.mydatatable th {
		background: #4472C4;
	}

	.mydatatable tr.odd {
		background: #CFD5EA;
	}

	.mydatatable tr.even {
		background: #E9EBF5;
	}
</style>

@endsection

{{-- Scripts Section --}}
@section('scripts')


<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pages/crud/datatables/basic/basic.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>



<script>
	function init() {

		// {
		// 	"name": "Jaguars",
		// 	"trade": "Concrete",
		// 	"address_line_1": "The Fifth Avenue",
		// 	"address_line_2": "#303",
		// 	"city": "New York",
		// 	"postal_code": "10011",
		// 	"state_or_province": "New York",
		// 	"country": "United States",
		// 	"phone": "(634)329-2353",
		// 	"website_url": "http://www.autodesk.com"
		// 	"description":"Jaguars is the world\"s largest concrete company."
		// 	"erp_id":"c79bf096-5a3e-41a4-aaf8-a771ed329047",
		// 	"tax_id":"413-07-5767"
		//   }
		document.getElementById("id").value = '{{ $data->id }}';
		document.getElementById("name").value = '{{ $data->name }}';
		document.getElementById("trade").value = '{{ $data->trade }}';
		document.getElementById("phone").value = '{{ $data->phone }}';
		document.getElementById("website_url").value = '{{ $data->website_url }}';
		document.getElementById("description").value = '{{ $data->description }}';
		document.getElementById("erp_id").value = '{{ $data->erp_id }}';
		document.getElementById("tax_id").value = '{{ $data->tax_id }}';
		document.getElementById("address_line_1").value = '{{ $data->address_line_1 }}';
		document.getElementById("address_line_2").value = '{{ $data->address_line_2 }}';
		document.getElementById("city").value = '{{ $data->city }}';
		document.getElementById("country").value = '{{ $data->country }}';
		loadStatesSelectItems();
		document.getElementById("state_or_province").value = '{{ $data->state_or_province }}';
		document.getElementById("postal_code").value = '{{ $data->postal_code }}';
		if (document.getElementById("id").value) {
			document.getElementById("lblTitle").innerHTML = 'Company: ' + document.getElementById("name").value;
		} else {
			document.getElementById("lblTitle").innerHTML = 'New Company';
		}

	}

	function fillResponseData(data) {
		document.getElementById("id").value = data.id;
		document.getElementById("name").value = data.name;
		document.getElementById("trade").value = data.trade;
		document.getElementById("phone").value = data.phone;
		document.getElementById("website_url").value = data.website_url;
		document.getElementById("description").value = data.description;
		document.getElementById("erp_id").value = data.erp_id;
		document.getElementById("tax_id").value = data.tax_id;
		document.getElementById("address_line_1").value = data.address_line_1;
		document.getElementById("address_line_2").value = data.address_line_2;
		document.getElementById("city").value = data.city;
		document.getElementById("country").value = data.country;
		loadStatesSelectItems();
		document.getElementById("state_or_province").value = data.state_or_province;
		document.getElementById("postal_code").value = data.postal_code;

		if (document.getElementById("id").value) {
			document.getElementById("lblTitle").innerHTML = 'Company: ' + document.getElementById("name").value;
		} else {
			document.getElementById("lblTitle").innerHTML = 'New Company';
		}
	}

	$(document).ready(function() {
		loadCountrySelectItems();
		init();
	});
</script>
@endsection