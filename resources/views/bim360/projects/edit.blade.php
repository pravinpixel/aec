{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<?php

$projecttypes = array(
	"Commercial",
	"Convention Center",
	"Data Center",
	"Hotel / Motel",
	"Office",
	"Parking Structure / Garage",
	"Performing Arts",
	"Retail",
	"Stadium/Arena",
	"Theme Park",
	"Warehouse (non-manufacturing)",
	"Healthcare",
	"Assisted Living / Nursing Home",
	"Hospital",
	"Medical Laboratory",
	"Medical Office",
	"OutPatient Surgery Center",
	"Institutional",
	"Court House",
	"Dormitory",
	"Education Facility",
	"Government Building",
	"Library",
	"Military Facility",
	"Museum",
	"Prison / Correctional Facility",
	"Recreation Building",
	"Religious Building",
	"Research Facility / Laboratory",
	"Residential",
	"Multi-Family Housing",
	"Single-Family Housing",
	"Infrastructure",
	"Airport",
	"Bridge",
	"Canal / Waterway",
	"Dams / Flood Control / Reservoirs",
	"Harbor / River Development",
	"Rail",
	"Seaport",
	"Streets / Roads / Highways",
	"Transportation Building",
	"Tunnel",
	"Waste Water / Sewers",
	"Water Supply",
	"Industrial & Energy",
	"Manufacturing / Factory",
	"Oil & Gas",
	"Plant",
	"Power Plant",
	"Solar Far",
	"Utilities",
	"Wind Farm",
	"Sample Projects",
	"Demonstration Project",
	"Template Project",
	"Training Project"
);

$timezones = array(
	"Pacific/Honolulu",
	"America/Juneau",
	"America/Los_Angeles",
	"America/Phoenix",
	"America/Denver",
	"America/Chicago",
	"America/New_York",
	"America/Indiana/Indianapolis",
	"Pacific/Pago_Pago",
	"Pacific/Midway",
	"America/Tijuana",
	"America/Chihuahua",
	"America/Mazatlan",
	"America/Guatemala",
	"America/Mexico_City",
	"America/Monterrey",
	"America/Regina",
	"America/Bogota",
	"America/Lima",
	"America/Caracas",
	"America/Halifax",
	"America/Guyana",
	"America/La_Paz",
	"America/Santiago",
	"America/St_Johns",
	"America/Sao_Paulo",
	"America/Argentina/Buenos_Aires",
	"America/Godthab",
	"Atlantic/South_Georgia",
	"Atlantic/Azores",
	"Atlantic/Cape_Verde",
	"Africa/Casablanca",
	"Europe/Dublin",
	"Europe/Lisbon",
	"Europe/London",
	"Africa/Monrovia",
	"ETC/UTC",
	"Europe/Amsterdam",
	"Europe/Belgrade",
	"Europe/Berlin",
	"Europe/Bratislava",
	"Europe/Brussels",
	"Europe/Budapest",
	"Europe/Copenhagen",
	"Europe/Ljubljana",
	"Europe/Madrid",
	"Europe/Paris",
	"Europe/Prague",
	"Europe/Rome",
	"Europe/Sarajevo",
	"Europe/Skopje",
	"Europe/Stockholm",
	"Europe/Vienna",
	"Europe/Warsaw",
	"Africa/Algiers",
	"Europe/Zagreb",
	"Europe/Athens",
	"Europe/Bucharest",
	"Africa/Cairo",
	"Africa/Harare",
	"Europe/Helsinki",
	"Europe/Istanbul",
	"Asia/Jerusalem",
	"Europe/Kiev",
	"Africa/Johannesburg",
	"Europe/Riga",
	"Europe/Sofia",
	"Europe/Tallinn",
	"Europe/Vilnius",
	"Asia/Baghdad",
	"Asia/Kuwait",
	"Europe/Minsk",
	"Africa/Nairobi",
	"Asia/Riyadh",
	"Asia/Tehran",
	"Asia/Muscat",
	"Asia/Baku",
	"Europe/Moscow",
	"Asia/Tbilisi",
	"Asia/Yerevan",
	"Asia/Kabul",
	"Asia/Karachi",
	"Asia/Tashkent",
	"Asia/Kolkata",
	"Asia/Colombo",
	"Asia/Kathmandu",
	"Asia/Almaty",
	"Asia/Dhaka",
	"Asia/Yekaterinburg",
	"Asia/Rangoon",
	"Asia/Bangkok",
	"Asia/Jakarta",
	"Asia/Novosibirsk",
	"Asia/Shanghai",
	"Asia/Chongqing",
	"Asia/Hong_Kong",
	"Asia/Krasnoyarsk",
	"Asia/Kuala_Lumpur",
	"Australia/Perth",
	"Asia/Singapore",
	"Asia/Taipei",
	"Asia/Ulaanbaatar",
	"Asia/Urumqi",
	"Asia/Irkutsk",
	"Asia/Tokyo",
	"Asia/Seoul",
	"Australia/Adelaide",
	"Australia/Darwin",
	"Australia/Brisbane",
	"Australia/Melbourne",
	"Pacific/Guam",
	"Australia/Hobart",
	"Pacific/Port_Moresby",
	"Australia/Sydney",
	"Asia/Yakutsk",
	"Pacific/Noumea",
	"Asia/Vladivostok",
	"Pacific/Auckland",
	"Pacific/Fiji",
	"Asia/Kamchatka",
	"Asia/Magadan",
	"Pacific/Majurov",
	"Pacific/Guadalcanal",
	"Pacific/Tongatapu",
	"Pacific/Apia",
	"Pacific/Fakaofo"
);

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

$servicetypes = array(
	"field" => "BIM 360 Field Service",
	"glue" => "BIM 360 Glue Service",
	"schedule" => "BIM 360 Schedule Service",
	"plan" => "BIM 360 Plan Service",
	"doc_manager" => "BIM 360 Docs Service"
);

$constructiontypes = array(
	"New Construction" => "to denote a new construction project",
	"Renovation" => "to denote a renovation project"
);

$contracttypes = array(
	"Construction Management (CM) at Risk" => "Construction contract is of type CM at Risk",
	"Design-Bid" => "Construction contract is design-build type",
	"Design-Bid-Build" => "Construction contract is design-bid-build type",
	"Design-Build-Operate" => "Construction contract is design-build-operate type",
	"IPD" => "Construction contract is integrated project delivery type"
);

$currencytypes = array(
	"USD" => "US Dollar",
	"AUD" => "Australian Dollar",
	"CAD" => "Canadian Dollar",
	"EUR" => "Euro",
	"GBP" => "Pound Sterling",
	"ALL" => "Albanian Lek",
	"AZN" => "Azerbaijani Manat",
	"BYR" => "Belarusian Ruble",
	"BRL" => "Brazilian Real",
	"BGN" => "Bulgarian Lev",
	"CNY" => "Chinese Yuan",
	"HRK" => "Croatian kuna",
	"CZK" => "Czech koruna",
	"DKK" => "Danish krone",
	"EEK" => "Estonian Kroon",
	"HKD" => "Hong Kong dollar",
	"HUF" => "Hungarian forint",
	"ISK" => "Icelandic króna",
	"INR" => "Indian rupee",
	"IRR" => "Iranian rial",
	"ILS" => "Israeli new shekel",
	"JPY" => "Japanese yen",
	"KZT" => "Kazakhstani tenge",
	"KRW" => "South Korean won",
	"KPW" => "North Korean won",
	"KGS" => "Kyrgyzstani som",
	"LVL" => "Latvian Lats",
	"LTL" => "Lithuanian Litas",
	"MKD" => "Macedonian denar",
	"MNT" => "Mongolian tögrög",
	"ANG" => "Netherlands Antillean guilder",
	"NOK" => "Norwegian krone",
	"PKR" => "Pakistani rupee",
	"PLN" => "Polish złoty",
	"RON" => "Romanian leu",
	"RUB" => "Russian ruble",
	"SAR" => "Saudi riyal",
	"RSD" => "Serbian dinar",
	"SGD" => "Singapore dollar",
	"ZAR" => "South African rand",
	"SEK" => "Swedish krona/kronor",
	"CHF" => "Swiss franc",
	"TWD" => "New Taiwan dollar",
	"TRL" => "Turkish Lira",
	"UAH" => "Ukrainian hryvnia",
	"UZS" => "Uzbekistan som",
	"YER" => "Yemeni rial",
	"PHP" => "Philippine peso",
	"NZD" => "New Zealand dollar"
);

$countries = array(
	"Afghanistan",
	"Åland Islands",
	"Albania",
	"Algeria",
	"American Samoa",
	"Andorra",
	"Angola",
	"Anguilla",
	"Antarctica",
	"Antigua and Barbuda",
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
	"Bolivia, Plurinational State of",
	"Bonaire, Sint Eustatius and Saba",
	"Bosnia and Herzegovina",
	"Botswana",
	"Bouvet Island",
	"Brazil",
	"British Indian Ocean Territory",
	"Brunei Darussalam",
	"Bulgaria",
	"Burkina Faso",
	"Burundi",
	"Cabo Verde",
	"Cambodia",
	"Cameroon",
	"Canada",
	"Cayman Islands",
	"Central African Republic",
	"Chad",
	"Chile",
	"China",
	"Christmas Island",
	"Cocos (Keeling) Islands",
	"Colombia",
	"Comoros",
	"Congo",
	"Congo, The Democratic Republic of the",
	"Cook Islands",
	"Costa Rica",
	"Côte d'Ivoire",
	"Croatia",
	"Cuba",
	"Curaçao",
	"Cyprus",
	"Czechia",
	"Denmark",
	"Djibouti",
	"Dominica",
	"Dominican Republic",
	"Ecuador",
	"Egypt",
	"El Salvador",
	"Equatorial Guinea",
	"Eritrea",
	"Estonia",
	"Ethiopia",
	"Falkland Islands (Malvinas)",
	"Faroe Islands",
	"Fiji",
	"Finland",
	"France",
	"French Guiana",
	"French Polynesia",
	"French Southern Territories",
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
	"Heard Island and McDonald Islands",
	"Holy See (Vatican City State)",
	"Honduras",
	"Hong Kong",
	"Hungary",
	"Iceland",
	"India",
	"Indonesia",
	"Iran, Islamic Republic of",
	"Iraq",
	"Ireland",
	"Isle of Man",
	"Israel",
	"Italy",
	"Jamaica",
	"Japan",
	"Jersey",
	"Jordan",
	"Kazakhstan",
	"Kenya",
	"Kiribati",
	"Korea, Democratic People's Republic of",
	"Korea, Republic of",
	"Kuwait",
	"Kyrgyzstan",
	"Lao People's Democratic Republic",
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
	"Marshall Islands",
	"Martinique",
	"Mauritania",
	"Mauritius",
	"Mayotte",
	"Mexico",
	"Micronesia, Federated States of",
	"Moldova, Republic of",
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
	"New Caledonia",
	"New Zealand",
	"Nicaragua",
	"Niger",
	"Nigeria",
	"Niue",
	"Norfolk Island",
	"North Macedonia",
	"Northern Mariana Islands",
	"Norway",
	"Oman",
	"Pakistan",
	"Palau",
	"Palestine, State of",
	"Panama",
	"Papua New Guinea",
	"Paraguay",
	"Peru",
	"Philippines",
	"Pitcairn",
	"Poland",
	"Portugal",
	"Puerto Rico",
	"Qatar",
	"Réunion",
	"Romania",
	"Russia",
	"Rwanda",
	"Saint Barthélemy",
	"Saint Helena, Ascension and Tristan da Cunha",
	"Saint Kitts and Nevis",
	"Saint Lucia",
	"Saint Martin (French part)",
	"Saint Pierre and Miquelon",
	"Saint Vincent and the Grenadines",
	"Samoa",
	"San Marino",
	"Sao Tome and Principe",
	"Saudi Arabia",
	"Senegal",
	"Serbia",
	"Seychelles",
	"Sierra Leone",
	"Singapore",
	"Sint Maarten (Dutch part)",
	"Slovakia",
	"Slovenia",
	"Solomon Islands",
	"Somalia",
	"South Africa",
	"South Georgia and the South Sandwich Islands",
	"South Sudan",
	"Spain",
	"Sri Lanka",
	"Sudan",
	"Suriname",
	"Svalbard and Jan Mayen",
	"Swaziland",
	"Sweden",
	"Switzerland",
	"Syrian Arab Republic",
	"Taiwan",
	"Tajikistan",
	"Tanzania, United Republic of",
	"Thailand",
	"Timor-Leste",
	"Togo",
	"Tokelau",
	"Tonga",
	"Trinidad and Tobago",
	"Tunisia",
	"Turkey",
	"Turkmenistan",
	"Turks and Caicos Islands",
	"Tuvalu",
	"Uganda",
	"Ukraine",
	"United Arab Emirates",
	"United Kingdom",
	"United States",
	"United States Minor Outlying Islands",
	"Uruguay",
	"Uzbekistan",
	"Vanuatu",
	"Venezuela, Bolivarian Republic of",
	"Vietnam",
	"Virgin Islands, British",
	"Virgin Islands, U.S.",
	"Wallis and Futuna",
	"Western Sahara",
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
				"Sant Julià de Lòria",
				"Andorra la Vella",
				"Escaldes-Engordany"
			]
		},
		{
			"country": "United Arab Emirates",
			"states": [
				"'Ajmān",
				"Abū Ȥaby [Abu Dhabi]",
				"Dubayy",
				"Al Fujayrah",
				"Ra’s al Khaymah",
				"Ash Shāriqah",
				"Umm al Qaywayn"
			]
		},
		{
			"country": "Afghanistan",
			"states": [
				"Balkh",
				"Bāmyān",
				"Bādghīs",
				"Badakhshān",
				"Baghlān",
				"Dāykundī",
				"Farāh",
				"Fāryāb",
				"Ghaznī",
				"Ghōr",
				"Helmand",
				"Herāt",
				"Jowzjān",
				"Kābul",
				"Kandahār",
				"Kāpīsā",
				"Kunduz",
				"Khōst",
				"Kunar",
				"Laghmān",
				"Lōgar",
				"Nangarhār",
				"Nīmrōz",
				"Nūristān",
				"Panjshayr",
				"Parwān",
				"Paktiyā",
				"Paktīkā",
				"Samangān",
				"Sar-e Pul",
				"Takhār",
				"Uruzgān",
				"Wardak",
				"Zābul"
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
				"Durrës",
				"Elbasan",
				"Fier",
				"Gjirokastër",
				"Korçë",
				"Kukës",
				"Lezhë",
				"Dibër",
				"Shkodër",
				"Tiranë",
				"Vlorë"
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
				"Bié",
				"Cabinda",
				"Cuando-Cubango",
				"Cunene",
				"Cuanza Norte",
				"Cuanza Sul",
				"Huambo",
				"Huíla",
				"Lunda Norte",
				"Lunda Sul",
				"Luanda",
				"Malange",
				"Moxico",
				"Namibe",
				"Uíge",
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
				"Ciudad Autónoma de Buenos Aires",
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
				"Kärnten",
				"Niederösterreich",
				"Oberösterreich",
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
			"country": "Åland Islands",
			"states": []
		},
		{
			"country": "Azerbaijan",
			"states": [
				"Abşeron",
				"Ağstafa",
				"Ağcabədi",
				"Ağdam",
				"Ağdaş",
				"Ağsu",
				"Astara",
				"Bakı",
				"Balakən",
				"Bərdə",
				"Beyləqan",
				"Biləsuvar",
				"Cəbrayıl",
				"Cəlilabab",
				"Daşkəsən",
				"Füzuli",
				"Gəncə",
				"Gədəbəy",
				"Goranboy",
				"Göyçay",
				"Göygöl",
				"Hacıqabul",
				"İmişli",
				"İsmayıllı",
				"Kəlbəcər",
				"Kürdəmir",
				"Lənkəran",
				"Laçın",
				"Lənkəran",
				"Lerik",
				"Masallı",
				"Mingəçevir",
				"Naftalan",
				"Neftçala",
				"Naxçıvan",
				"Oğuz",
				"Qəbələ",
				"Qax",
				"Qazax",
				"Quba",
				"Qubadlı",
				"Qobustan",
				"Qusar",
				"Şəki",
				"Sabirabad",
				"Şəki",
				"Salyan",
				"Saatlı",
				"Şabran",
				"Siyəzən",
				"Şəmkir",
				"Sumqayıt",
				"Şamaxı",
				"Samux",
				"Şirvan",
				"Şuşa",
				"Tərtər",
				"Tovuz",
				"Ucar",
				"Xankəndi",
				"Xaçmaz",
				"Xocalı",
				"Xızı",
				"Xocavənd",
				"Yardımlı",
				"Yevlax",
				"Yevlax",
				"Zəngilan",
				"Zaqatala",
				"Zərdab"
			]
		},
		{
			"country": "Bosnia and Herzegovina",
			"states": [
				"Federacija Bosne i Hercegovine",
				"Brčko distrikt",
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
				"Bruxelles-Capitale, Région de;Brussels Hoofdstedelijk Gewest",
				"Vlaams Gewest",
				"wallonne, Région"
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
				"Al Manāmah (Al ‘Āşimah)",
				"Al Janūbīyah",
				"Al Muḩarraq",
				"Al Wusţá",
				"Ash Shamālīyah"
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
				"Ouémé",
				"Plateau",
				"Zou"
			]
		},
		{
			"country": "Saint Barthélemy",
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
				"Potosí",
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
				"Amapá",
				"Bahia",
				"Ceará",
				"Distrito Federal",
				"Espírito Santo",
				"Fernando de Noronha",
				"Goiás",
				"Maranhão",
				"Minas Gerais",
				"Mato Grosso do Sul",
				"Mato Grosso",
				"Pará",
				"Paraíba",
				"Pernambuco",
				"Piauí",
				"Paraná",
				"Rio de Janeiro",
				"Rio Grande do Norte",
				"Rondônia",
				"Roraima",
				"Rio Grande do Sul",
				"Santa Catarina",
				"Sergipe",
				"São Paulo",
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
				"Brèsckaja voblasc'",
				"Horad Minsk",
				"Homel'skaja voblasc'",
				"Hrodzenskaja voblasc'",
				"Mahilëuskaja voblasc'",
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
				"Équateur",
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
				"Haute-Sangha / Mambéré-Kadéï",
				"Gribingui",
				"Kémo-Gribingui",
				"Lobaye",
				"Mbomou",
				"Ombella-M'poko",
				"Nana-Mambéré",
				"Ouham-Pendé",
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
				"Lékoumou",
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
				"Genève",
				"Glarus",
				"Graubünden",
				"Jura",
				"Luzern",
				"Neuchâtel",
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
				"Zürich"
			]
		},
		{
			"country": "Côte d'Ivoire",
			"states": [
				"Lagunes (Région des)",
				"Haut-Sassandra (Région du)",
				"Savanes (Région des)",
				"Vallée du Bandama (Région de la)",
				"Moyen-Comoé (Région du)",
				"18 Montagnes (Région des)",
				"Lacs (Région des)",
				"Zanzan (Région du)",
				"Bas-Sassandra (Région du)",
				"Denguélé (Région du)",
				"Nzi-Comoé (Région)",
				"Marahoué (Région de la)",
				"Sud-Comoé (Région du)",
				"Worodouqou (Région du)",
				"Sud-Bandama (Région du)",
				"Agnébi (Région de l')",
				"Bafing (Région du)",
				"Fromager (Région du)",
				"Moyen-Cavally (Région du)"
			]
		},
		{
			"country": "Cook Islands",
			"states": []
		},
		{
			"country": "Chile",
			"states": [
				"Aisén del General Carlos Ibáñez del Campo",
				"Antofagasta",
				"Arica y Parinacota",
				"Araucanía",
				"Atacama",
				"Bío-Bío",
				"Coquimbo",
				"Libertador General Bernardo O'Higgins",
				"Los Lagos",
				"Los Ríos",
				"Magallanes y Antártica Chilena",
				"Maule",
				"Región Metropolitana de Santiago",
				"Tarapacá",
				"Valparaíso"
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
				"Atlántico",
				"Bolívar",
				"Boyacá",
				"Caldas",
				"Caquetá",
				"Casanare",
				"Cauca",
				"Cesar",
				"Chocó",
				"Córdoba",
				"Cundinamarca",
				"Distrito Capital de Bogotá",
				"Guainía",
				"Guaviare",
				"Huila",
				"La Guajira",
				"Magdalena",
				"Meta",
				"Nariño",
				"Norte de Santander",
				"Putumayo",
				"Quindío",
				"Risaralda",
				"Santander",
				"San Andrés, Providencia y Santa Catalina",
				"Sucre",
				"Tolima",
				"Valle del Cauca",
				"Vaupés",
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
				"Limón",
				"Puntarenas",
				"San José"
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
				"Sancti Spíritus",
				"Ciego de Ávila",
				"Camagüey",
				"Las Tunas",
				"Holguín",
				"Granma",
				"Santiago de Cuba",
				"Guantánamo",
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
			"country": "Curaçao",
			"states": []
		},
		{
			"country": "Christmas Island",
			"states": []
		},
		{
			"country": "Cyprus",
			"states": [
				"Lefkosía",
				"Lemesós",
				"Lárnaka",
				"Ammóchostos",
				"Páfos",
				"Kerýneia"
			]
		},
		{
			"country": "Czech Republic",
			"states": [
				"Jihočeský kraj",
				"Jihomoravský kraj",
				"Karlovarský kraj",
				"Královéhradecký kraj",
				"Liberecký kraj",
				"Moravskoslezský kraj",
				"Olomoucký kraj",
				"Pardubický kraj",
				"Plzeňský kraj",
				"Praha, hlavní město",
				"Středočeský kraj",
				"Ústecký kraj",
				"Vysočina",
				"Zlínský kraj"
			]
		},
		{
			"country": "Germany",
			"states": [
				"Brandenburg",
				"Berlin",
				"Baden-Württemberg",
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
				"Thüringen"
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
				"Sjælland"
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
				"Dajabón",
				"Duarte",
				"La Estrelleta [Elías Piña]",
				"El Seybo [El Seibo]",
				"Espaillat",
				"Independencia",
				"La Altagracia",
				"La Romana",
				"La Vega",
				"María Trinidad Sánchez",
				"Monte Cristi",
				"Pedernales",
				"Peravia",
				"Puerto Plata",
				"Salcedo",
				"Samaná",
				"San Cristóbal",
				"San Juan",
				"San Pedro de Macorís",
				"Sánchez Ramírez",
				"Santiago",
				"Santiago Rodríguez",
				"Valverde",
				"Monseñor Nouel",
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
				"Béjaïa",
				"Biskra",
				"Béchar",
				"Blida",
				"Bouira",
				"Tamanghasset",
				"Tébessa",
				"Tlemcen",
				"Tiaret",
				"Tizi Ouzou",
				"Alger",
				"Djelfa",
				"Jijel",
				"Sétif",
				"Saïda",
				"Skikda",
				"Sidi Bel Abbès",
				"Annaba",
				"Guelma",
				"Constantine",
				"Médéa",
				"Mostaganem",
				"Msila",
				"Mascara",
				"Ouargla",
				"Oran",
				"El Bayadh",
				"Illizi",
				"Bordj Bou Arréridj",
				"Boumerdès",
				"El Tarf",
				"Tindouf",
				"Tissemsilt",
				"El Oued",
				"Khenchela",
				"Souk Ahras",
				"Tipaza",
				"Mila",
				"Aïn Defla",
				"Naama",
				"Aïn Témouchent",
				"Ghardaïa",
				"Relizane"
			]
		},
		{
			"country": "Ecuador",
			"states": [
				"Azuay",
				"Bolívar",
				"Carchi",
				"Orellana",
				"Esmeraldas",
				"Cañar",
				"Guayas",
				"Chimborazo",
				"Imbabura",
				"Loja",
				"Manabí",
				"Napo",
				"El Oro",
				"Pichincha",
				"Los Ríos",
				"Morona-Santiago",
				"Santo Domingo de los Tsáchilas",
				"Santa Elena",
				"Tungurahua",
				"Sucumbíos",
				"Galápagos",
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
				"Jõgevamaa",
				"Järvamaa",
				"Läänemaa",
				"Lääne-Virumaa",
				"Põlvamaa",
				"Pärnumaa",
				"Raplamaa",
				"Saaremaa",
				"Tartumaa",
				"Valgamaa",
				"Viljandimaa",
				"Võrumaa"
			]
		},
		{
			"country": "Egypt",
			"states": [
				"Al Iskandarīyah",
				"Aswān",
				"Asyūt",
				"Al Bahr al Ahmar",
				"Al Buhayrah",
				"Banī Suwayf",
				"Al Qāhirah",
				"Ad Daqahlīyah",
				"Dumyāt",
				"Al Fayyūm",
				"Al Gharbīyah",
				"Al Jīzah",
				"Ḩulwān",
				"Al Ismā`īlīyah",
				"Janūb Sīnā'",
				"Al Qalyūbīyah",
				"Kafr ash Shaykh",
				"Qinā",
				"Al Minyā",
				"Al Minūfīyah",
				"Matrūh",
				"Būr Sa`īd",
				"Sūhāj",
				"Ash Sharqīyah",
				"Shamal Sīnā'",
				"As Sādis min Uktūbar",
				"As Suways",
				"Al Wādī al Jadīd"
			]
		},
		{
			"country": "Western Sahara",
			"states": []
		},
		{
			"country": "Eritrea",
			"states": [
				"Ansabā",
				"Janūbī al Baḩrī al Aḩmar",
				"Al Janūbī",
				"Qāsh-Barkah",
				"Al Awsaţ",
				"Shimālī al Baḩrī al Aḩmar"
			]
		},
		{
			"country": "Spain",
			"states": [
				"Andalucía",
				"Aragón",
				"Asturias, Principado de",
				"Cantabria",
				"Ceuta",
				"Castilla y León",
				"Castilla-La Mancha",
				"Canarias",
				"Catalunya",
				"Extremadura",
				"Galicia",
				"Illes Balears",
				"Murcia, Región de",
				"Madrid, Comunidad de",
				"Melilla",
				"Navarra, Comunidad Foral de / Nafarroako Foru Komunitatea",
				"País Vasco / Euskal Herria",
				"La Rioja",
				"Valenciana, Comunidad / Valenciana, Comunitat "
			]
		},
		{
			"country": "Ethiopia",
			"states": [
				"Ādīs Ābeba",
				"Āfar",
				"Āmara",
				"Bīnshangul Gumuz",
				"Dirē Dawa",
				"Gambēla Hizboch",
				"Hārerī Hizb",
				"Oromīya",
				"YeDebub Bihēroch Bihēreseboch na Hizboch",
				"Sumalē",
				"Tigray"
			]
		},
		{
			"country": "Finland",
			"states": [
				"Ahvenanmaan maakunta",
				"Etelä-Karjala",
				"Etelä-Pohjanmaa",
				"Etelä-Savo",
				"Kainuu",
				"Kanta-Häme",
				"Keski-Pohjanmaa",
				"Keski-Suomi",
				"Kymenlaakso",
				"Lappi",
				"Pirkanmaa",
				"Pohjanmaa",
				"Pohjois-Karjala",
				"Pohjois-Pohjanmaa",
				"Pohjois-Savo",
				"Päijät-Häme",
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
				"Saint-Barthélemy",
				"Auvergne",
				"Clipperton",
				"Bourgogne",
				"Bretagne",
				"Centre",
				"Champagne-Ardenne",
				"Guyane",
				"Guadeloupe",
				"Corse",
				"Franche-Comté",
				"Île-de-France",
				"Languedoc-Roussillon",
				"Limousin",
				"Lorraine",
				"Saint-Martin",
				"Martinique",
				"Midi-Pyrénées",
				"Nouvelle-Calédonie",
				"Nord-Pas-de-Calais",
				"Basse-Normandie",
				"Polynésie française",
				"Saint-Pierre-et-Miquelon",
				"Haute-Normandie",
				"Pays de la Loire",
				"La Réunion",
				"Picardie",
				"Poitou-Charentes",
				"Terres australes françaises",
				"Provence-Alpes-Côte d'Azur",
				"Rhône-Alpes",
				"Wallis-et-Futuna",
				"Mayotte"
			]
		},
		{
			"country": "Gabon",
			"states": [
				"Estuaire",
				"Haut-Ogooué",
				"Moyen-Ogooué",
				"Ngounié",
				"Nyanga",
				"Ogooué-Ivindo",
				"Ogooué-Lolo",
				"Ogooué-Maritime",
				"Woleu-Ntem"
			]
		},
		{
			"country": "United Kingdom",
			"states": [
				"Aberdeenshire",
				"Aberdeen City",
				"Argyll and Bute",
				"Isle of Anglesey;Sir Ynys Môn",
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
				"Imeret’i",
				"Kakhet’i",
				"K’vemo K’art’li",
				"Mts’khet’a-Mt’ianet’i",
				"Racha-Lech’khumi-K’vemo Svanet’i",
				"Samts’khe-Javakhet’i",
				"Shida K’art’li",
				"Samegrelo-Zemo Svanet’i",
				"T’bilisi"
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
				"Boké",
				"Conakry",
				"Kindia",
				"Faranah",
				"Kankan",
				"Labé",
				"Mamou",
				"Nzérékoré"
			]
		},
		{
			"country": "Guadeloupe",
			"states": []
		},
		{
			"country": "Equatorial Guinea",
			"states": [
				"Región Continental",
				"Región Insular"
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
				"Petén",
				"El Progreso",
				"Quiché",
				"Quetzaltenango",
				"Retalhuleu",
				"Sacatepéquez",
				"San Marcos",
				"Sololá",
				"Santa Rosa",
				"Suchitepéquez",
				"Totonicapán",
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
				"Atlántida",
				"Choluteca",
				"Colón",
				"Comayagua",
				"Copán",
				"Cortés",
				"El Paraíso",
				"Francisco Morazán",
				"Gracias a Dios",
				"Islas de la Bahía",
				"Intibucá",
				"Lempira",
				"La Paz",
				"Ocotepeque",
				"Olancho",
				"Santa Bárbara",
				"Valle",
				"Yoro"
			]
		},
		{
			"country": "Croatia",
			"states": [
				"Zagrebačka županija",
				"Krapinsko-zagorska županija",
				"Sisačko-moslavačka županija",
				"Karlovačka županija",
				"Varaždinska županija",
				"Koprivničko-križevačka županija",
				"Bjelovarsko-bilogorska županija",
				"Primorsko-goranska županija",
				"Ličko-senjska županija",
				"Virovitičko-podravska županija",
				"Požeško-slavonska županija",
				"Brodsko-posavska županija",
				"Zadarska županija",
				"Osječko-baranjska županija",
				"Šibensko-kninska županija",
				"Vukovarsko-srijemska županija",
				"Splitsko-dalmatinska županija",
				"Istarska županija",
				"Dubrovačko-neretvanska županija",
				"Međimurska županija",
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
				"Békéscsaba",
				"Békés",
				"Bács-Kiskun",
				"Budapest",
				"Borsod-Abaúj-Zemplén",
				"Csongrád",
				"Debrecen",
				"Dunaújváros",
				"Eger",
				"Érd",
				"Fejér",
				"Győr-Moson-Sopron",
				"Győr",
				"Hajdú-Bihar",
				"Heves",
				"Hódmezővásárhely",
				"Jász-Nagykun-Szolnok",
				"Komárom-Esztergom",
				"Kecskemét",
				"Kaposvár",
				"Miskolc",
				"Nagykanizsa",
				"Nógrád",
				"Nyíregyháza",
				"Pest",
				"Pécs",
				"Szeged",
				"Székesfehérvár",
				"Szombathely",
				"Szolnok",
				"Sopron",
				"Somogy",
				"Szekszárd",
				"Salgótarján",
				"Szabolcs-Szatmár-Bereg",
				"Tatabánya",
				"Tolna",
				"Vas",
				"Veszprém (county)",
				"Veszprém",
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
				"Āzarbāyjān-e Sharqī",
				"Āzarbāyjān-e Gharbī",
				"Ardabīl",
				"Eşfahān",
				"Īlām",
				"Būshehr",
				"Tehrān",
				"Chahār Mahāll va Bakhtīārī",
				"Khūzestān",
				"Zanjān",
				"Semnān",
				"Sīstān va Balūchestān",
				"Fārs",
				"Kermān",
				"Kordestān",
				"Kermānshāh",
				"Kohgīlūyeh va Būyer Ahmad",
				"Gīlān",
				"Lorestān",
				"Māzandarān",
				"Markazī",
				"Hormozgān",
				"Hamadān",
				"Yazd",
				"Qom",
				"Golestān",
				"Qazvīn",
				"Khorāsān-e Janūbī",
				"Khorāsān-e Razavī",
				"Khorāsān-e Shemālī"
			]
		},
		{
			"country": "Iceland",
			"states": [
				"Reykjavík",
				"Höfuðborgarsvæðið",
				"Suðurnes",
				"Vesturland",
				"Vestfirðir",
				"Norðurland vestra",
				"Norðurland eystra",
				"Austurland",
				"Suðurland"
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
				"‘Ajlūn",
				"‘Ammān (Al ‘Aşimah)",
				"Al ‘Aqabah",
				"Aţ Ţafīlah",
				"Az Zarqā'",
				"Al Balqā'",
				"Irbid",
				"Jarash",
				"Al Karak",
				"Al Mafraq",
				"Mādabā",
				"Ma‘ān"
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
				"Chü",
				"Bishkek",
				"Jalal-Abad",
				"Naryn",
				"Osh",
				"Talas",
				"Ysyk-Köl"
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
				"Andjouân (Anjwān)",
				"Andjazîdja (Anjazījah)",
				"Moûhîlî (Mūhīlī)"
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
				"P’yŏngyang",
				"P’yŏngan-namdo",
				"P’yŏngan-bukto",
				"Chagang-do",
				"Hwanghae-namdo",
				"Hwanghae-bukto",
				"Kangwŏn-do",
				"Hamgyŏng-namdo",
				"Hamgyŏng-bukto",
				"Yanggang-do",
				"Nasŏn (Najin-Sŏnbong)"
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
				"Al Farwānīyah",
				"Hawallī",
				"Al Jahrrā’",
				"Al Kuwayt (Al ‘Āşimah)",
				"Mubārak al Kabīr"
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
				"Aqtöbe oblysy",
				"Almaty",
				"Almaty oblysy",
				"Astana",
				"Atyraū oblysy",
				"Qaraghandy oblysy",
				"Qostanay oblysy",
				"Qyzylorda oblysy",
				"Mangghystaū oblysy",
				"Pavlodar oblysy",
				"Soltüstik Quzaqstan oblysy",
				"Shyghys Qazaqstan oblysy",
				"Ongtüstik Qazaqstan oblysy",
				"Batys Quzaqstan oblysy",
				"Zhambyl oblysy"
			]
		},
		{
			"country": "Lao People's Democratic Republic",
			"states": [
				"Attapu",
				"Bokèo",
				"Bolikhamxai",
				"Champasak",
				"Houaphan",
				"Khammouan",
				"Louang Namtha",
				"Louangphabang",
				"Oudômxai",
				"Phôngsali",
				"Salavan",
				"Savannakhét",
				"Vientiane",
				"Vientiane",
				"Xaignabouli",
				"Xékong",
				"Xiangkhoang",
				"Xiasômboun"
			]
		},
		{
			"country": "Lebanon",
			"states": [
				"Aakkâr",
				"Liban-Nord",
				"Beyrouth",
				"Baalbek-Hermel",
				"Béqaa",
				"Liban-Sud",
				"Mont-Liban",
				"Nabatîyé"
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
				"Basnāhira paḷāta",
				"Madhyama paḷāta",
				"Dakuṇu paḷāta",
				"Uturu paḷāta",
				"Næ̆gĕnahira paḷāta",
				"Vayamba paḷāta",
				"Uturumæ̆da paḷāta",
				"Ūva paḷāta",
				"Sabaragamuva paḷāta"
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
				"Klaipėdos Apskritis",
				"Kauno Apskritis",
				"Marijampolės Apskritis",
				"Panevėžio Apskritis",
				"Šiaulių Apskritis",
				"Tauragés Apskritis",
				"Telšių Apskritis",
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
				"Aknīstes novads",
				"Alojas novads",
				"Alsungas novads",
				"Alūksnes novads",
				"Amatas novads",
				"Apes novads",
				"Auces novads",
				"Ādažu novads",
				"Babītes novads",
				"Baldones novads",
				"Baltinavas novads",
				"Balvu novads",
				"Bauskas novads",
				"Beverīnas novads",
				"Brocēnu novads",
				"Burtnieku novads",
				"Carnikavas novads",
				"Cesvaines novads",
				"Cēsu novads",
				"Ciblas novads",
				"Dagdas novads",
				"Daugavpils novads",
				"Dobeles novads",
				"Dundagas novads",
				"Durbes novads",
				"Engures novads",
				"Ērgļu novads",
				"Garkalnes novads",
				"Grobiņas novads",
				"Gulbenes novads",
				"Iecavas novads",
				"Ikšķiles novads",
				"Ilūkstes novads",
				"Inčukalna novads",
				"Jaunjelgavas novads",
				"Jaunpiebalgas novads",
				"Jaunpils novads",
				"Jelgavas novads",
				"Jēkabpils novads",
				"Kandavas novads",
				"Kārsavas novads",
				"Kocēnu novads",
				"Kokneses novads",
				"Krāslavas novads",
				"Krimuldas novads",
				"Krustpils novads",
				"Kuldīgas novads",
				"Ķeguma novads",
				"Ķekavas novads",
				"Lielvārdes novads",
				"Limbažu novads",
				"Līgatnes novads",
				"Līvānu novads",
				"Lubānas novads",
				"Ludzas novads",
				"Madonas novads",
				"Mazsalacas novads",
				"Mālpils novads",
				"Mārupes novads",
				"Mērsraga novads",
				"Naukšēnu novads",
				"Neretas novads",
				"Nīcas novads",
				"Ogres novads",
				"Olaines novads",
				"Ozolnieku novads",
				"Pārgaujas novads",
				"Pāvilostas novads",
				"Pļaviņu novads",
				"Preiļu novads",
				"Priekules novads",
				"Priekuļu novads",
				"Raunas novads",
				"Rēzeknes novads",
				"Riebiņu novads",
				"Rojas novads",
				"Ropažu novads",
				"Rucavas novads",
				"Rugāju novads",
				"Rundāles novads",
				"Rūjienas novads",
				"Salas novads",
				"Salacgrīvas novads",
				"Salaspils novads",
				"Saldus novads",
				"Saulkrastu novads",
				"Sējas novads",
				"Siguldas novads",
				"Skrīveru novads",
				"Skrundas novads",
				"Smiltenes novads",
				"Stopiņu novads",
				"Strenču novads",
				"Talsu novads",
				"Tērvetes novads",
				"Tukuma novads",
				"Vaiņodes novads",
				"Valkas novads",
				"Varakļānu novads",
				"Vārkavas novads",
				"Vecpiebalgas novads",
				"Vecumnieku novads",
				"Ventspils novads",
				"Viesītes novads",
				"Viļakas novads",
				"Viļānu novads",
				"Zilupes novads",
				"Daugavpils",
				"Jelgava",
				"Jēkabpils",
				"Jūrmala",
				"Liepāja",
				"Rēzekne",
				"Rīga",
				"Ventspils",
				"Valmiera"
			]
		},
		{
			"country": "Libya",
			"states": [
				"Banghāzī",
				"Al Buţnān",
				"Darnah",
				"Ghāt",
				"Al Jabal al Akhḑar",
				"Jaghbūb",
				"Al Jabal al Gharbī",
				"Al Jifārah",
				"Al Jufrah",
				"Al Kufrah",
				"Al Marqab",
				"Mişrātah",
				"Al Marj",
				"Murzuq",
				"Nālūt",
				"An Nuqaţ al Khams",
				"Sabhā",
				"Surt",
				"Ţarābulus",
				"Al Wāḩāt",
				"Wādī al Ḩayāt",
				"Wādī ash Shāţiʾ",
				"Az Zāwiyah"
			]
		},
		{
			"country": "Morocco",
			"states": [
				"Tanger-Tétouan",
				"Gharb-Chrarda-Beni Hssen",
				"Taza-Al Hoceima-Taounate",
				"L'Oriental",
				"Fès-Boulemane",
				"Meknès-Tafilalet",
				"Rabat-Salé-Zemmour-Zaer",
				"Grand Casablanca",
				"Chaouia-Ouardigha",
				"Doukhala-Abda",
				"Marrakech-Tensift-Al Haouz",
				"Tadla-Azilal",
				"Sous-Massa-Draa",
				"Guelmim-Es Smara",
				"Laâyoune-Boujdour-Sakia el Hamra",
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
				"Sainte-Dévote",
				"La Source",
				"Spélugues",
				"Saint-Roman",
				"Vallon de la Rousse"
			]
		},
		{
			"country": "Moldova, Republic of",
			"states": [
				"Anenii Noi",
				"Bălți",
				"Tighina",
				"Briceni",
				"Basarabeasca",
				"Cahul",
				"Călărași",
				"Cimișlia",
				"Criuleni",
				"Căușeni",
				"Cantemir",
				"Chișinău",
				"Dondușeni",
				"Drochia",
				"Dubăsari",
				"Edineț",
				"Fălești",
				"Florești",
				"Găgăuzia, Unitatea teritorială autonomă",
				"Glodeni",
				"Hîncești",
				"Ialoveni",
				"Leova",
				"Nisporeni",
				"Ocnița",
				"Orhei",
				"Rezina",
				"Rîșcani",
				"Șoldănești",
				"Sîngerei",
				"Stînga Nistrului, unitatea teritorială din",
				"Soroca",
				"Strășeni",
				"Ștefan Vodă",
				"Taraclia",
				"Telenești",
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
				"Kolašin",
				"Kotor",
				"Mojkovac",
				"Nikšić",
				"Plav",
				"Pljevlja",
				"Plužine",
				"Podgorica",
				"Rožaje",
				"Šavnik",
				"Tivat",
				"Ulcinj",
				"Žabljak"
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
				"Aračinovo",
				"Berovo",
				"Bitola",
				"Bogdanci",
				"Bogovinje",
				"Bosilovo",
				"Brvenica",
				"Butel",
				"Valandovo",
				"Vasilevo",
				"Vevčani",
				"Veles",
				"Vinica",
				"Vraneštica",
				"Vrapčište",
				"Gazi Baba",
				"Gevgelija",
				"Gostivar",
				"Gradsko",
				"Debar",
				"Debarca",
				"Delčevo",
				"Demir Kapija",
				"Demir Hisar",
				"Dojran",
				"Dolneni",
				"Drugovo",
				"Gjorče Petrov",
				"Želino",
				"Zajas",
				"Zelenikovo",
				"Zrnovci",
				"Ilinden",
				"Jegunovce",
				"Kavadarci",
				"Karbinci",
				"Karpoš",
				"Kisela Voda",
				"Kičevo",
				"Konče",
				"Kočani",
				"Kratovo",
				"Kriva Palanka",
				"Krivogaštani",
				"Kruševo",
				"Kumanovo",
				"Lipkovo",
				"Lozovo",
				"Mavrovo-i-Rostuša",
				"Makedonska Kamenica",
				"Makedonski Brod",
				"Mogila",
				"Negotino",
				"Novaci",
				"Novo Selo",
				"Oslomej",
				"Ohrid",
				"Petrovec",
				"Pehčevo",
				"Plasnica",
				"Prilep",
				"Probištip",
				"Radoviš",
				"Rankovce",
				"Resen",
				"Rosoman",
				"Saraj",
				"Sveti Nikole",
				"Sopište",
				"Staro Nagoričane",
				"Struga",
				"Strumica",
				"Studeničani",
				"Tearce",
				"Tetovo",
				"Centar",
				"Centar Župa",
				"Čair",
				"Čaška",
				"Češinovo-Obleševo",
				"Čučer Sandevo",
				"Štip",
				"Šuto Orizari"
			]
		},
		{
			"country": "Mali",
			"states": [
				"Kayes",
				"Koulikoro",
				"Sikasso",
				"Ségou",
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
				"Hövsgöl",
				"Hovd",
				"Uvs",
				"Töv",
				"Selenge",
				"Sühbaatar",
				"Ömnögovi",
				"Övörhangay",
				"Dzavhan",
				"Dundgovi",
				"Dornod",
				"Dornogovi",
				"Govi-Sumber",
				"Govi-Altay",
				"Bulgan",
				"Bayanhongor",
				"Bayan-Ölgiy",
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
				"Birżebbuġa",
				"Bormla",
				"Dingli",
				"Fgura",
				"Floriana",
				"Fontana",
				"Gudja",
				"Gżira",
				"Għajnsielem",
				"Għarb",
				"Għargħur",
				"Għasri",
				"Għaxaq",
				"Ħamrun",
				"Iklin",
				"Isla",
				"Kalkara",
				"Kerċem",
				"Kirkop",
				"Lija",
				"Luqa",
				"Marsa",
				"Marsaskala",
				"Marsaxlokk",
				"Mdina",
				"Mellieħa",
				"Mġarr",
				"Mosta",
				"Mqabba",
				"Msida",
				"Mtarfa",
				"Munxar",
				"Nadur",
				"Naxxar",
				"Paola",
				"Pembroke",
				"Pietà",
				"Qala",
				"Qormi",
				"Qrendi",
				"Rabat Għawdex",
				"Rabat Malta",
				"Safi",
				"San Ġiljan",
				"San Ġwann",
				"San Lawrenz",
				"San Pawl il-Baħar",
				"Sannat",
				"Santa Luċija",
				"Santa Venera",
				"Siġġiewi",
				"Sliema",
				"Swieqi",
				"Ta’ Xbiex",
				"Tarxien",
				"Valletta",
				"Xagħra",
				"Xewkija",
				"Xgħajra",
				"Żabbar",
				"Żebbuġ Għawdex",
				"Żebbuġ Malta",
				"Żejtun",
				"Żurrieq"
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
				"Rivière du Rempart",
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
				"México",
				"Michoacán",
				"Morelos",
				"Nayarit",
				"Nuevo León",
				"Oaxaca",
				"Puebla",
				"Querétaro",
				"Quintana Roo",
				"Sinaloa",
				"San Luis Potosí",
				"Sonora",
				"Tabasco",
				"Tamaulipas",
				"Tlaxcala",
				"Veracruz",
				"Yucatán",
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
				"Tillabéri",
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
				"Atlántico Norte",
				"Atlántico Sur",
				"Boaco",
				"Carazo",
				"Chinandega",
				"Chontales",
				"Estelí",
				"Granada",
				"Jinotega",
				"León",
				"Madriz",
				"Managua",
				"Masaya",
				"Matagalpa",
				"Nueva Segovia",
				"Rivas",
				"Río San Juan"
			]
		},
		{
			"country": "Netherlands",
			"states": [
				"Aruba",
				"Bonaire",
				"Saba",
				"Sint Eustatius",
				"Curaçao",
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
				"Østfold",
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
				"Møre og Romsdal",
				"Sør-Trøndelag",
				"Nord-Trøndelag",
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
				"Al Bāţinah",
				"Al Buraymī",
				"Ad Dākhilīya",
				"Masqaţ",
				"Musandam",
				"Ash Sharqīyah",
				"Al Wusţá",
				"Az̧ Z̧āhirah",
				"Z̧ufār"
			]
		},
		{
			"country": "Panama",
			"states": [
				"Bocas del Toro",
				"Coclé",
				"Colón",
				"Chiriquí",
				"Darién",
				"Herrera",
				"Los Santos",
				"Panamá",
				"Veraguas",
				"Emberá",
				"Kuna Yala",
				"Ngöbe-Buglé"
			]
		},
		{
			"country": "Peru",
			"states": [
				"Amazonas",
				"Ancash",
				"Apurímac",
				"Arequipa",
				"Ayacucho",
				"Cajamarca",
				"El Callao",
				"Cusco [Cuzco]",
				"Huánuco",
				"Huancavelica",
				"Ica",
				"Junín",
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
				"San Martín",
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
				"Dolnośląskie",
				"Kujawsko-pomorskie",
				"Lubuskie",
				"Łódzkie",
				"Lubelskie",
				"Małopolskie",
				"Mazowieckie",
				"Opolskie",
				"Podlaskie",
				"Podkarpackie",
				"Pomorskie",
				"Świętokrzyskie",
				"Śląskie",
				"Warmińsko-mazurskie",
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
				"Bragança",
				"Castelo Branco",
				"Coimbra",
				"Évora",
				"Faro",
				"Guarda",
				"Leiria",
				"Lisboa",
				"Portalegre",
				"Porto",
				"Santarém",
				"Setúbal",
				"Viana do Castelo",
				"Vila Real",
				"Viseu",
				"Região Autónoma dos Açores",
				"Região Autónoma da Madeira"
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
				"Concepción",
				"Alto Paraná",
				"Central",
				"Ñeembucú",
				"Amambay",
				"Canindeyú",
				"Presidente Hayes",
				"Alto Paraguay",
				"Boquerón",
				"San Pedro",
				"Cordillera",
				"Guairá",
				"Caaguazú",
				"Caazapá",
				"Itapúa",
				"Misiones",
				"Paraguarí",
				"Asunción"
			]
		},
		{
			"country": "Qatar",
			"states": [
				"Ad Dawhah",
				"Al Khawr wa adh Dhakhīrah",
				"Ash Shamal",
				"Ar Rayyan",
				"Umm Salal",
				"Al Wakrah",
				"Az̧ Z̧a‘āyin"
			]
		},
		{
			"country": "Réunion",
			"states": []
		},
		{
			"country": "Romania",
			"states": [
				"Alba",
				"Argeș",
				"Arad",
				"București",
				"Bacău",
				"Bihor",
				"Bistrița-Năsăud",
				"Brăila",
				"Botoșani",
				"Brașov",
				"Buzău",
				"Cluj",
				"Călărași",
				"Caraș-Severin",
				"Constanța",
				"Covasna",
				"Dâmbovița",
				"Dolj",
				"Gorj",
				"Galați",
				"Giurgiu",
				"Hunedoara",
				"Harghita",
				"Ilfov",
				"Ialomița",
				"Iași",
				"Mehedinți",
				"Maramureș",
				"Mureș",
				"Neamț",
				"Olt",
				"Prahova",
				"Sibiu",
				"Sălaj",
				"Satu Mare",
				"Suceava",
				"Tulcea",
				"Timiș",
				"Teleorman",
				"Vâlcea",
				"Vrancea",
				"Vaslui"
			]
		},
		{
			"country": "Serbia",
			"states": [
				"Beograd",
				"Mačvanski okrug",
				"Kolubarski okrug",
				"Podunavski okrug",
				"Braničevski okrug",
				"Šumadijski okrug",
				"Pomoravski okrug",
				"Borski okrug",
				"Zaječarski okrug",
				"Zlatiborski okrug",
				"Moravički okrug",
				"Raški okrug",
				"Rasinski okrug",
				"Nišavski okrug",
				"Toplički okrug",
				"Pirotski okrug",
				"Jablanički okrug",
				"Pčinjski okrug",
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
				"Ar Riyāḍ",
				"Makkah",
				"Al Madīnah",
				"Ash Sharqīyah",
				"Al Qaşīm",
				"Ḥā'il",
				"Tabūk",
				"Al Ḥudūd ash Shamāliyah",
				"Jīzan",
				"Najrān",
				"Al Bāhah",
				"Al Jawf",
				"`Asīr"
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
				"Sharq Dārfūr",
				"Shamāl Dārfūr",
				"Janūb Dārfūr",
				"Gharb Dārfūr",
				"Al Qaḑārif",
				"Al Jazīrah",
				"Kassalā",
				"Al Kharţūm",
				"Shamāl Kurdufān",
				"Janūb Kurdufān",
				"An Nīl al Azraq",
				"Ash Shamālīyah",
				"An Nīl",
				"An Nīl al Abyaḑ",
				"Al Baḩr al Aḩmar",
				"Sinnār"
			]
		},
		{
			"country": "Sweden",
			"states": [
				"Stockholms län",
				"Västerbottens län",
				"Norrbottens län",
				"Uppsala län",
				"Södermanlands län",
				"Östergötlands län",
				"Jönköpings län",
				"Kronobergs län",
				"Kalmar län",
				"Gotlands län",
				"Blekinge län",
				"Skåne län",
				"Hallands län",
				"Västra Götalands län",
				"Värmlands län",
				"Örebro län",
				"Västmanlands län",
				"Dalarnas län",
				"Gävleborgs län",
				"Västernorrlands län",
				"Jämtlands län"
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
				"Ajdovščina",
				"Beltinci",
				"Bled",
				"Bohinj",
				"Borovnica",
				"Bovec",
				"Brda",
				"Brezovica",
				"Brežice",
				"Tišina",
				"Celje",
				"Cerklje na Gorenjskem",
				"Cerknica",
				"Cerkno",
				"Črenšovci",
				"Črna na Koroškem",
				"Črnomelj",
				"Destrnik",
				"Divača",
				"Dobrepolje",
				"Dobrova-Polhov Gradec",
				"Dol pri Ljubljani",
				"Domžale",
				"Dornava",
				"Dravograd",
				"Duplek",
				"Gorenja vas-Poljane",
				"Gorišnica",
				"Gornja Radgona",
				"Gornji Grad",
				"Gornji Petrovci",
				"Grosuplje",
				"Šalovci",
				"Hrastnik",
				"Hrpelje-Kozina",
				"Idrija",
				"Ig",
				"Ilirska Bistrica",
				"Ivančna Gorica",
				"Izola/Isola",
				"Jesenice",
				"Juršinci",
				"Kamnik",
				"Kanal",
				"Kidričevo",
				"Kobarid",
				"Kobilje",
				"Kočevje",
				"Komen",
				"Koper/Capodistria",
				"Kozje",
				"Kranj",
				"Kranjska Gora",
				"Krško",
				"Kungota",
				"Kuzma",
				"Laško",
				"Lenart",
				"Lendava/Lendva",
				"Litija",
				"Ljubljana",
				"Ljubno",
				"Ljutomer",
				"Logatec",
				"Loška dolina",
				"Loški Potok",
				"Luče",
				"Lukovica",
				"Majšperk",
				"Maribor",
				"Medvode",
				"Mengeš",
				"Metlika",
				"Mežica",
				"Miren-Kostanjevica",
				"Mislinja",
				"Moravče",
				"Moravske Toplice",
				"Mozirje",
				"Murska Sobota",
				"Muta",
				"Naklo",
				"Nazarje",
				"Nova Gorica",
				"Novo mesto",
				"Odranci",
				"Ormož",
				"Osilnica",
				"Pesnica",
				"Piran/Pirano",
				"Pivka",
				"Podčetrtek",
				"Podvelka",
				"Postojna",
				"Preddvor",
				"Ptuj",
				"Puconci",
				"Rače-Fram",
				"Radeče",
				"Radenci",
				"Radlje ob Dravi",
				"Radovljica",
				"Ravne na Koroškem",
				"Ribnica",
				"Rogašovci",
				"Rogaška Slatina",
				"Rogatec",
				"Ruše",
				"Semič",
				"Sevnica",
				"Sežana",
				"Slovenj Gradec",
				"Slovenska Bistrica",
				"Slovenske Konjice",
				"Starče",
				"Sveti Jurij",
				"Šenčur",
				"Šentilj",
				"Šentjernej",
				"Šentjur",
				"Škocjan",
				"Škofja Loka",
				"Škofljica",
				"Šmarje pri Jelšah",
				"Šmartno ob Paki",
				"Šoštanj",
				"Štore",
				"Tolmin",
				"Trbovlje",
				"Trebnje",
				"Tržič",
				"Turnišče",
				"Velenje",
				"Velike Lašče",
				"Videm",
				"Vipava",
				"Vitanje",
				"Vodice",
				"Vojnik",
				"Vrhnika",
				"Vuzenica",
				"Zagorje ob Savi",
				"Zavrč",
				"Zreče",
				"Železniki",
				"Žiri",
				"Benedikt",
				"Bistrica ob Sotli",
				"Bloke",
				"Braslovče",
				"Cankova",
				"Cerkvenjak",
				"Dobje",
				"Dobrna",
				"Dobrovnik/Dobronak",
				"Dolenjske Toplice",
				"Grad",
				"Hajdina",
				"Hoče-Slivnica",
				"Hodoš/Hodos",
				"Horjul",
				"Jezersko",
				"Komenda",
				"Kostel",
				"Križevci",
				"Lovrenc na Pohorju",
				"Markovci",
				"Miklavž na Dravskem polju",
				"Mirna Peč",
				"Oplotnica",
				"Podlehnik",
				"Polzela",
				"Prebold",
				"Prevalje",
				"Razkrižje",
				"Ribnica na Pohorju",
				"Selnica ob Dravi",
				"Sodražica",
				"Solčava",
				"Sveta Ana",
				"Sveta Andraž v Slovenskih Goricah",
				"Šempeter-Vrtojba",
				"Tabor",
				"Trnovska vas",
				"Trzin",
				"Velika Polana",
				"Veržej",
				"Vransko",
				"Žalec",
				"Žetale",
				"Žirovnica",
				"Žužemberk",
				"Šmartno pri Litiji",
				"Apače",
				"Cirkulane",
				"Kosanjevica na Krki",
				"Makole",
				"Mokronog-Trebelno",
				"Poljčane",
				"Renče-Vogrsko",
				"Središče ob Dravi",
				"Straža",
				"Sveta Trojica v Slovenskih Goricah",
				"Sveti Tomaž",
				"Šmarjeske Topliče",
				"Gorje",
				"Log-Dragomer",
				"Rečica ob Savinji",
				"Sveti Jurij v Slovenskih Goricah",
				"Šentrupert"
			]
		},
		{
			"country": "Svalbard and Jan Mayen",
			"states": []
		},
		{
			"country": "Slovakia",
			"states": [
				"Banskobystrický kraj",
				"Bratislavský kraj",
				"Košický kraj",
				"Nitriansky kraj",
				"Prešovský kraj",
				"Trnavský kraj",
				"Trenčiansky kraj",
				"Žilinský kraj"
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
				"Kédougou",
				"Kaolack",
				"Louga",
				"Matam",
				"Sédhiou",
				"Saint-Louis",
				"Tambacounda",
				"Thiès",
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
				"Príncipe",
				"São Tomé"
			]
		},
		{
			"country": "El Salvador",
			"states": [
				"Ahuachapán",
				"Cabañas",
				"Chalatenango",
				"Cuscatlán",
				"La Libertad",
				"Morazán",
				"La Paz",
				"Santa Ana",
				"San Miguel",
				"Sonsonate",
				"San Salvador",
				"San Vicente",
				"La Unión",
				"Usulután"
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
				"Al Baṭḩah",
				"Baḩr al Ghazāl",
				"Būrkū",
				"Shārī Bāqirmī",
				"Innīdī",
				"Qīrā",
				"Ḥajjar Lamīs",
				"Kānim",
				"Al Buḩayrah",
				"Lūqūn al Gharbī",
				"Lūqūn ash Sharqī",
				"Māndūl",
				"Shārī al Awsaṭ",
				"Māyū Kībbī ash Sharqī",
				"Māyū Kībbī al Gharbī",
				"Madīnat Injamīnā",
				"Waddāy",
				"Salāmāt",
				"Sīlā",
				"Tānjilī",
				"Tibastī",
				"Wādī Fīrā"
			]
		},
		{
			"country": "French Southern Territories",
			"states": []
		},
		{
			"country": "Togo",
			"states": [
				"Région du Centre",
				"Région de la Kara",
				"Région Maritime",
				"Région des Plateaux",
				"Région des Savannes"
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
				"Díli",
				"Ermera",
				"Lautem",
				"Liquiça",
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
				"Daşoguz",
				"Lebap",
				"Mary",
				"Aşgabat"
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
				"Béja",
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
				"Gabès",
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
				"Adıyaman",
				"Afyonkarahisar",
				"Ağrı",
				"Amasya",
				"Ankara",
				"Antalya",
				"Artvin",
				"Aydın",
				"Balıkesir",
				"Bilecik",
				"Bingöl",
				"Bitlis",
				"Bolu",
				"Burdur",
				"Bursa",
				"Çanakkale",
				"Çankırı",
				"Çorum",
				"Denizli",
				"Diyarbakır",
				"Edirne",
				"Elazığ",
				"Erzincan",
				"Erzurum",
				"Eskişehir",
				"Gaziantep",
				"Giresun",
				"Gümüşhane",
				"Hakkâri",
				"Hatay",
				"Isparta",
				"Mersin",
				"İstanbul",
				"İzmir",
				"Kars",
				"Kastamonu",
				"Kayseri",
				"Kırklareli",
				"Kırşehir",
				"Kocaeli",
				"Konya",
				"Kütahya",
				"Malatya",
				"Manisa",
				"Kahramanmaraş",
				"Mardin",
				"Muğla",
				"Muş",
				"Nevşehir",
				"Niğde",
				"Ordu",
				"Rize",
				"Sakarya",
				"Samsun",
				"Siirt",
				"Sinop",
				"Sivas",
				"Tekirdağ",
				"Tokat",
				"Trabzon",
				"Tunceli",
				"Şanlıurfa",
				"Uşak",
				"Van",
				"Yozgat",
				"Zonguldak",
				"Aksaray",
				"Bayburt",
				"Karaman",
				"Kırıkkale",
				"Batman",
				"Şırnak",
				"Bartın",
				"Ardahan",
				"Iğdır",
				"Yalova",
				"Karabük",
				"Kilis",
				"Osmaniye",
				"Düzce"
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
				"Kyïvs'ka mis'ka rada",
				"Kyïvs'ka Oblast'",
				"Kirovohrads'ka Oblast'",
				"Sevastopol",
				"Respublika Krym",
				"L'vivs'ka Oblast'",
				"Mykolaïvs'ka Oblast'",
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
				"Paysandú",
				"Río Negro",
				"Rocha",
				"Rivera",
				"Salto",
				"San José",
				"Soriano",
				"Tacuarembó",
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
				"Anzoátegui",
				"Apure",
				"Aragua",
				"Barinas",
				"Bolívar",
				"Carabobo",
				"Cojedes",
				"Falcón",
				"Guárico",
				"Lara",
				"Mérida",
				"Miranda",
				"Monagas",
				"Nueva Esparta",
				"Portuguesa",
				"Sucre",
				"Táchira",
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
				"Lai Châu",
				"Lào Cai",
				"Hà Giang",
				"Cao Bằng",
				"Sơn La",
				"Yên Bái",
				"Tuyên Quang",
				"Lạng Sơn",
				"Quảng Ninh",
				"Hoà Bình",
				"Hà Tây",
				"Ninh Bình",
				"Thái Bình",
				"Thanh Hóa",
				"Nghệ An",
				"Hà Tỉnh",
				"Quảng Bình",
				"Quảng Trị",
				"Thừa Thiên-Huế",
				"Quảng Nam",
				"Kon Tum",
				"Quảng Ngãi",
				"Gia Lai",
				"Bình Định",
				"Phú Yên",
				"Đắc Lắk",
				"Khánh Hòa",
				"Lâm Đồng",
				"Ninh Thuận",
				"Tây Ninh",
				"Đồng Nai",
				"Bình Thuận",
				"Long An",
				"Bà Rịa-Vũng Tàu",
				"An Giang",
				"Đồng Tháp",
				"Tiền Giang",
				"Kiên Giang",
				"Vĩnh Long",
				"Bến Tre",
				"Trà Vinh",
				"Sóc Trăng",
				"Bắc Kạn",
				"Bắc Giang",
				"Bạc Liêu",
				"Bắc Ninh",
				"Bình Dương",
				"Bình Phước",
				"Cà Mau",
				"Hải Duong",
				"Hà Nam",
				"Hưng Yên",
				"Nam Định",
				"Phú Thọ",
				"Thái Nguyên",
				"Vĩnh Phúc",
				"Điện Biên",
				"Đắk Nông",
				"Hậu Giang",
				"Cần Thơ",
				"Đà Nẵng",
				"Hà Nội",
				"Hải Phòng",
				"Hồ Chí Minh [Sài Gòn]"
			]
		},
		{
			"country": "Vanuatu",
			"states": [
				"Malampa",
				"Pénama",
				"Sanma",
				"Shéfa",
				"Taféa",
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
				"Abyān",
				"'Adan",
				"'Amrān",
				"Al Bayḑā'",
				"Aḑ Ḑāli‘",
				"Dhamār",
				"Ḩaḑramawt",
				"Ḩajjah",
				"Ibb",
				"Al Jawf",
				"Laḩij",
				"Ma'rib",
				"Al Mahrah",
				"Al Ḩudaydah",
				"Al Maḩwīt",
				"Raymah",
				"Şa'dah",
				"Shabwah",
				"Şan'ā'",
				"Tā'izz"
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

	function getProjectInfo() {

		var projectinfo = {};
		projectinfo.id = document.getElementById("id").value;
		projectinfo.name = document.getElementById("name").value;
		projectinfo.start_date = document.getElementById("start_date").value;
		projectinfo.end_date = document.getElementById("end_date").value;
		projectinfo.project_type = document.getElementById("project_type").value;
		projectinfo.value = document.getElementById("value").value;
		projectinfo.currency = document.getElementById("currency").value;
		projectinfo.status = document.getElementById("status").value;
		projectinfo.job_number = document.getElementById("job_number").value;
		projectinfo.address_line_1 = document.getElementById("address_line_1").value;
		projectinfo.address_line_2 = document.getElementById("address_line_2").value;
		projectinfo.city = document.getElementById("city").value;
		projectinfo.state_or_province = document.getElementById("state_or_province").value;
		projectinfo.postal_code = document.getElementById("postal_code").value;
		projectinfo.country = document.getElementById("country").value;
		projectinfo.timezone = document.getElementById("timezone").value;
		projectinfo.language = document.getElementById("language").value;
		projectinfo.construction_type = document.getElementById("construction_type").value;
		projectinfo.contract_type = document.getElementById("contract_type").value;
		projectinfo.service_types = document.getElementById("service_types").value;

		// projectinfo.business_unit_id = document.getElementById("business_unit_id").value;
		// projectinfo.last_sign_in = document.getElementById("last_sign_in").value;
		// projectinfo.copy_project_job_id = document.getElementById("copy_project_job_id").value;
		// projectinfo.created_at = document.getElementById("created_at").value;
		// projectinfo.updated_at = document.getElementById("updated_at").value;
		// projectinfo.template_project_id = document.getElementById("template_project_id").value;
		// projectinfo.include_companies = document.getElementById("include_companies").value;
		// projectinfo.include_locations = document.getElementById("include_locations").value;

		return projectinfo;
	}

	var saveProjectInProgress = false;
	var isValidProject = true;

	function validateProject(project) {
		var valid = true;

		return valid;
	}

	function saveProject() {
		if (saveProjectInProgress) return;
		saveProjectInProgress = true;
		var project = getProjectInfo();

		// vaidate project
		isValidProject = validateProject(project);
		if (!isValidProject) {
			saveProjectInProgress = false;
			return;
		}

		var projectform = document.getElementById('projectform');

		var data = new FormData(projectform);
		data.append('_token', '{{csrf_token()}}');
		// Save project
		$.ajax({
			url: "{{ route('/bim360/saveproject') }}",
			type: 'post',
			data: data,
			contentType: false,
			processData: false,
			success: function(response) {
				if (response.data) {
					fillResponseData(response.data);
				}
				saveProjectInProgress = false;
			},
		});

	}
</script>


<div>
	<div class="p-0">
		<div class="p-0">
			<div class="row justify-content-between bg-primary p-1 text-gray-900">
				<span class="form-text"></span>
				<h2 class="lblEnquiry p-2" id="lblEnquiryNo">New Project</h2>
				<span id="spnClose" class="form-text mr-5"><i class="flaticon-circle icon-2x text-danger"></i></span>
			</div>

			<!--begin::Wizard-->
			<div class="wizard wizard-1 pt-0" id="kt_wizard" data-wizard-state="step-first" data-wizard-clickable="false">
				<!--begin::Wizard Nav-->
				<div class="wizard-nav border-bottom ">
					<div class="wizard-steps">
						<!--begin::Wizard Step 1 Nav-->
						<div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
							<div class="wizard-label">
								<i class="wizard-icon flaticon-home-1"></i>
								<h3 class="wizard-title">1. Project Information</h3>
							</div>
							<span class="svg-icon svg-icon-xl wizard-arrow">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24" />
										<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
										<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
						</div>
						<!--end::Wizard Step 1 Nav-->
						<!--begin::Wizard Step 2 Nav-->
						<div class="wizard-step" data-wizard-type="step">
							<div class="wizard-label">
								<i class="wizard-icon flaticon-list"></i>
								<h3 class="wizard-title">2. Document Management</h3>
							</div>
							<span class="svg-icon svg-icon-xl wizard-arrow">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24" />
										<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
										<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
						</div>
						<!--end::Wizard Step 2 Nav-->
						<!--begin::Wizard Step 3 Nav-->
						<div class="wizard-step" data-wizard-type="step">
							<div class="wizard-label">
								<i class="wizard-icon flaticon-folder-1"></i>
								<h3 class="wizard-title">3. Project Management</h3>
							</div>
							<span class="svg-icon svg-icon-xl wizard-arrow">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24" />
										<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
										<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
						</div>
						<!--end::Wizard Step 3 Nav-->
						<!--begin::Wizard Step 4 Nav-->
						<div class="wizard-step" data-wizard-type="step">
							<div class="wizard-label">
								<i class="wizard-icon flaticon-web"></i>
								<h3 class="wizard-title">4. Approval Workflow</h3>
							</div>
						</div>
						<!--end::Wizard Step 4 Nav-->

					</div>
				</div>
				<!--end::Wizard Nav-->
				<!--begin::Wizard Body-->
				<div class="row justify-content-center my-10 px-8 my-lg-10 px-lg-10">
					<div class="col-xl-12 col-xl-7">
						<!--begin::Wizard Form-->
						<form class="form" id="projectform" enctype="multipart/form-data">
							<input type="hidden" id="id" name="id" value="{{ $data->id }}" />
							<!--begin::Wizard Step 1-->
							<div class="pb-0" data-wizard-type="step-content" data-wizard-state="current">
								<div class="row">
									<div class="col-sm-6">
										<!--begin::Input-->
										<div class="form-group">
											<label>Project Name<span class="text-danger">*</span></label>
											<input type="text" id="name" name="name" placeholder="Project Name" class="form-control form-control-solid form-control-lg" value="" />
											<span class="form-text text-muted"></span>
										</div>

										<div class="form-group">
											<label>Project Type<span class="text-danger">*</span></label>
											<select name="project_type" id="project_type" class="form-control form-control-solid form-control-lg">
												<option value="">Project Type</option>
												<?php
												foreach ($projecttypes as $key => $value) {
													echo '<option value="' . strtolower($value) . '">' . $value . '</option>';
												}
												?>
											</select>
											<span class="form-text text-muted"></span>
										</div>

										<div class="form-group">
											<label>Construction Type<span class="text-danger">*</span></label>
											<select name="construction_type" id="construction_type" class="form-control form-control-solid form-control-lg">
												<option value="New Construction" title="to denote a new construction project">New Construction</option>
												<option value="Renovation" title="to denote a renovation project">Renovation</option>
											</select>
											<span class="form-text text-muted"></span>
										</div>

										<div class="form-group">
											<label>Project Value<span class="text-danger">*</span></label>
											<div class="input-group">
												<input type="number" id="value" class="form-control form-control-solid form-control-lg" name="value" placeholder="Project Value" value="" />
												<div class="input-group-append">
													<select id="currency" name="currency" class="form-control form-control-solid form-control-lg">
														<?php
														foreach ($currencytypes as $key => $value) {
															echo '<option value="' . $key . '" title="' . $value . '">' . $key . '</option>';
														}
														?>
													</select>
												</div>
											</div>
											<span class="form-text text-muted"></span>
										</div>

										<div class="form-group">
											<label>Contract Type<span class="text-danger">*</span></label>
											<select name="contract_type" id="contract_type" class="form-control form-control-solid form-control-lg">
												<option value="Construction Management (CM) at Risk" title="Construction contract is of type CM at Risk">Construction Management (CM) at Risk</option>
												<option value="Design-Bid" title="Construction contract is design-build type">Design-Bid</option>
												<option value="Design-Bid-Build" title="Construction contract is design-bid-build type">Design-Bid-Build</option>
												<option value="Design-Build-Operate" title="Construction contract is design-build-operate type">Design-Build-Operate</option>
												<option value="IPD" title="Construction contract is integrated project delivery type">IPD</option>
											</select>
											<span class="form-text text-muted"></span>
										</div>
										<div class="row">
											<div class="col">
												<div class="form-group">
													<label>Project Start Date<span class="text-danger">*</span></label>
													<input type="date" id="start_date" name="start_date" class="form-control form-control-solid form-control-lg" placeholder="Project Start Date" value="" />
													<span class="form-text text-muted"></span>
												</div>
											</div>
											<div class="col">
												<div class="form-group">
													<label>Project End Date<span class="text-danger">*</span></label>
													<input type="date" id="end_date" name="end_date" class="form-control form-control-solid form-control-lg" placeholder="Project End Date" value="" />
													<span class="form-text text-muted"></span>
												</div>
											</div>
										</div>

										<div class="form-group">
											<label>Project Job Number<span class="text-danger">*</span></label>
											<input type="text" id="job_number" name="job_number" class="form-control form-control-solid form-control-lg" placeholder="Project Job Number" value="" />
											<span class="form-text text-muted"></span>
										</div>
										<!-- <div class="form-group">
										<label>Business Unit<span class="text-danger">*</span></label>
										<select id="business_unit_id" name="business_unit_id" class="form-control form-control-solid form-control-lg">
											<option value="">Business Unit</option>
										</select>
										<span class="form-text text-muted"></span>
									</div> -->

										<div class="form-group">
											<label>Service Types<span class="text-danger"></span></label>
											<input type="text" name="service_types" id="service_types" class="form-control form-control-solid form-control-lg" value="" />
											<span class="form-text text-muted"></span>
										</div>

										<div class="form-group">
											<label>Status<span class="text-danger"></span></label>
											<select name="status" id="status" class="form-control form-control-solid form-control-lg">
												<option value="active">Active</option>
												<option value="pending">Pending</option>
												<option value="inactive">Inactive</option>
												<option value="archived">Archived</option>
											</select>
											<span class="form-text text-muted"></span>
										</div>

									</div>
									<div class="col-sm-6">

										<div class="form-group">
											<label>Project Image<span class="text-danger">*</span></label>
											<div>
												<img id="imgImage" alt="Project Image" class="img-fluid" src="" width="50" />
											</div>
											<div>
												<input type="file" id="image" name="image" class="form-control form-control-solid form-control-lg" placeholder="Project Name" value="" />
											</div>
											<span class="form-text text-muted"></span>
										</div>

										<div class="form-group">
											<label>Project Address Line 1<span class="text-danger">*</span></label>
											<input type="text" id="address_line_1" name="address_line_1" class="form-control form-control-solid form-control-lg" placeholder="Project Address Line 1" value="" />
											<span class="form-text text-muted"></span>
										</div>
										<div class="form-group">
											<label>Project Address Line 2<span class="text-danger">*</span></label>
											<input type="text" id="address_line_2" name="address_line_2" class="form-control form-control-solid form-control-lg" placeholder="Project Address Line 2" value="" />
											<span class="form-text text-muted"></span>
										</div>
										<div class="row">
											<div class="col">
												<div class="form-group">
													<label>City<span class="text-danger">*</span></label>
													<input type="text" id="city" name="city" class="form-control form-control-solid form-control-lg" placeholder="City" value="" />
													<span class="form-text text-muted"></span>
												</div>
											</div>
											<div class="col">
												<div class="form-group">
													<label>Postal Code<span class="text-danger">*</span></label>
													<input type="text" id="postal_code" name="postal_code" class="form-control form-control-solid form-control-lg" placeholder="Postal Code" value="" />
													<span class="form-text text-muted"></span>
												</div>
											</div>
										</div>

										<div class="form-group">
											<label>State<span class="text-danger">*</span></label>
											<select id="state_or_province" name="state_or_province" class="form-control form-control-solid form-control-lg">
												<option value="">State / Province</option>
											</select>
											<span class="form-text text-muted"></span>
										</div>
										<div class="form-group">
											<label>Country<span class="text-danger">*</span></label>
											<select name="country" id="country" onchange="loadStatesSelectItems();" class="form-control form-control-solid form-control-lg">
												<option value="">Country</option>
											</select>
											<span class="form-text text-muted"></span>
										</div>
										<div class="form-group">
											<label>Project Time Zone<span class="text-danger">*</span></label>
											<select id="timezone" name="timezone" class="form-control form-control-solid form-control-lg">
												<option value="Pacific/Honolulu">(GMT-10:00) Hawaii</option>
												<option value="America/Juneau">(GMT-09:00) Alaska</option>
												<option value="America/Los_Angeles">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
												<option value="America/Phoenix">(GMT-07:00) Arizona</option>
												<option value="America/Denver">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
												<option value="America/Chicago">(GMT-06:00) Central Time (US &amp; Canada)</option>
												<option value="America/New_York">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
												<option value="America/Indiana/Indianapolis">(GMT-05:00) Indiana (East)</option>
												<option value="" disabled=""></option>
												<option value="Pacific/Pago_Pago">(GMT-11:00) American Samoa</option>
												<option value="Pacific/Midway">(GMT-11:00) International Date Line West/Midway Island</option>
												<option value="America/Tijuana">(GMT-08:00) Tijuana</option>
												<option value="America/Chihuahua">(GMT-07:00) Chihuahua</option>
												<option value="America/Mazatlan">(GMT-07:00) Mazatlan</option>
												<option value="America/Guatemala">(GMT-06:00) Central America</option>
												<option value="America/Mexico_City">(GMT-06:00) Guadalajara/Mexico City</option>
												<option value="America/Monterrey">(GMT-06:00) Monterrey</option>
												<option value="America/Regina">(GMT-06:00) Saskatchewan</option>
												<option value="America/Bogota">(GMT-05:00) Bogota</option>
												<option value="America/Lima">(GMT-05:00) Lima/Quito</option>
												<option value="America/Caracas">(GMT-04:30) Caracas</option>
												<option value="America/Halifax">(GMT-04:00) Atlantic Time (Canada)</option>
												<option value="America/Guyana">(GMT-04:00) Georgetown</option>
												<option value="America/La_Paz">(GMT-04:00) La Paz</option>
												<option value="America/Santiago">(GMT-04:00) Santiago</option>
												<option value="America/St_Johns">(GMT-03:30) Newfoundland</option>
												<option value="America/Sao_Paulo">(GMT-03:00) Brasilia</option>
												<option value="America/Argentina/Buenos_Aires">(GMT-03:00) Buenos Aires</option>
												<option value="America/Godthab">(GMT-03:00) Greenland</option>
												<option value="Atlantic/South_Georgia">(GMT-02:00) Mid-Atlantic</option>
												<option value="Atlantic/Azores">(GMT-01:00) Azores</option>
												<option value="Atlantic/Cape_Verde">(GMT-01:00) Cape Verde Is.</option>
												<option value="Africa/Casablanca">(GMT+00:00) Casablanca</option>
												<option value="Europe/Dublin">(GMT+00:00) Dublin</option>
												<option value="Europe/Lisbon">(GMT+00:00) Lisbon</option>
												<option value="Europe/London">(GMT+00:00) Edinburgh/London</option>
												<option value="Africa/Monrovia">(GMT+00:00) Monrovia</option>
												<option value="Etc/UTC">(GMT+00:00) UTC</option>
												<option value="Europe/Amsterdam">(GMT+01:00) Amsterdam</option>
												<option value="Europe/Belgrade">(GMT+01:00) Belgrade</option>
												<option value="Europe/Berlin">(GMT+01:00) Berlin/Bern</option>
												<option value="Europe/Bratislava">(GMT+01:00) Bratislava</option>
												<option value="Europe/Brussels">(GMT+01:00) Brussels</option>
												<option value="Europe/Budapest">(GMT+01:00) Budapest</option>
												<option value="Europe/Copenhagen">(GMT+01:00) Copenhagen</option>
												<option value="Europe/Ljubljana">(GMT+01:00) Ljubljana</option>
												<option value="Europe/Madrid">(GMT+01:00) Madrid</option>
												<option value="Europe/Paris">(GMT+01:00) Paris</option>
												<option value="Europe/Prague">(GMT+01:00) Prague</option>
												<option value="Europe/Rome">(GMT+01:00) Rome</option>
												<option value="Europe/Sarajevo">(GMT+01:00) Sarajevo</option>
												<option value="Europe/Skopje">(GMT+01:00) Skopje</option>
												<option value="Europe/Stockholm">(GMT+01:00) Stockholm</option>
												<option value="Europe/Vienna">(GMT+01:00) Vienna</option>
												<option value="Europe/Warsaw">(GMT+01:00) Warsaw</option>
												<option value="Africa/Algiers">(GMT+01:00) West Central Africa</option>
												<option value="Europe/Zagreb">(GMT+01:00) Zagreb</option>
												<option value="Europe/Athens">(GMT+02:00) Athens</option>
												<option value="Europe/Bucharest">(GMT+02:00) Bucharest</option>
												<option value="Africa/Cairo">(GMT+02:00) Cairo</option>
												<option value="Africa/Harare">(GMT+02:00) Harare</option>
												<option value="Europe/Helsinki">(GMT+02:00) Helsinki</option>
												<option value="Europe/Istanbul">(GMT+02:00) Istanbul</option>
												<option value="Asia/Jerusalem">(GMT+02:00) Jerusalem</option>
												<option value="Europe/Kiev">(GMT+02:00) Kyiv</option>
												<option value="Africa/Johannesburg">(GMT+02:00) Pretoria</option>
												<option value="Europe/Riga">(GMT+02:00) Riga</option>
												<option value="Europe/Sofia">(GMT+02:00) Sofia</option>
												<option value="Europe/Tallinn">(GMT+02:00) Tallinn</option>
												<option value="Europe/Vilnius">(GMT+02:00) Vilnius</option>
												<option value="Asia/Baghdad">(GMT+03:00) Baghdad</option>
												<option value="Asia/Kuwait">(GMT+03:00) Kuwait</option>
												<option value="Europe/Minsk">(GMT+03:00) Minsk</option>
												<option value="Africa/Nairobi">(GMT+03:00) Nairobi</option>
												<option value="Asia/Riyadh">(GMT+03:00) Riyadh</option>
												<option value="Asia/Tehran">(GMT+03:30) Tehran</option>
												<option value="Asia/Muscat">(GMT+04:00) Abu Dhabi/Muscat</option>
												<option value="Asia/Baku">(GMT+04:00) Baku</option>
												<option value="Europe/Moscow">(GMT+04:00) Moscow/St. Petersburg/Volgograd</option>
												<option value="Asia/Tbilisi">(GMT+04:00) Tbilisi</option>
												<option value="Asia/Yerevan">(GMT+04:00) Yerevan</option>
												<option value="Asia/Kabul">(GMT+04:30) Kabul</option>
												<option value="Asia/Karachi">(GMT+05:00) Islamabad/Karachi</option>
												<option value="Asia/Tashkent">(GMT+05:00) Tashkent</option>
												<option value="Asia/Kolkata">(GMT+05:30) Chennai/Kolkata/Mumbai/New Delhi</option>
												<option value="Asia/Colombo">(GMT+05:30) Sri Jayawardenepura</option>
												<option value="Asia/Kathmandu">(GMT+05:45) Kathmandu</option>
												<option value="Asia/Almaty">(GMT+06:00) Almaty</option>
												<option value="Asia/Dhaka">(GMT+06:00) Astana/Dhaka</option>
												<option value="Asia/Yekaterinburg">(GMT+06:00) Ekaterinburg</option>
												<option value="Asia/Rangoon">(GMT+06:30) Rangoon</option>
												<option value="Asia/Bangkok">(GMT+07:00) Bangkok/Hanoi</option>
												<option value="Asia/Jakarta">(GMT+07:00) Jakarta</option>
												<option value="Asia/Novosibirsk">(GMT+07:00) Novosibirsk</option>
												<option value="Asia/Shanghai">(GMT+08:00) Beijing</option>
												<option value="Asia/Chongqing">(GMT+08:00) Chongqing</option>
												<option value="Asia/Hong_Kong">(GMT+08:00) Hong Kong</option>
												<option value="Asia/Krasnoyarsk">(GMT+08:00) Krasnoyarsk</option>
												<option value="Asia/Kuala_Lumpur">(GMT+08:00) Kuala Lumpur</option>
												<option value="Australia/Perth">(GMT+08:00) Perth</option>
												<option value="Asia/Singapore">(GMT+08:00) Singapore</option>
												<option value="Asia/Taipei">(GMT+08:00) Taipei</option>
												<option value="Asia/Ulaanbaatar">(GMT+08:00) Ulaan Bataar</option>
												<option value="Asia/Urumqi">(GMT+08:00) Urumqi</option>
												<option value="Asia/Irkutsk">(GMT+09:00) Irkutsk</option>
												<option value="Asia/Tokyo">(GMT+09:00) Osaka/Sapporo/Tokyo</option>
												<option value="Asia/Seoul">(GMT+09:00) Seoul</option>
												<option value="Australia/Adelaide">(GMT+09:30) Adelaide</option>
												<option value="Australia/Darwin">(GMT+09:30) Darwin</option>
												<option value="Australia/Brisbane">(GMT+10:00) Brisbane</option>
												<option value="Australia/Melbourne">(GMT+10:00) Canberra/Melbourne</option>
												<option value="Pacific/Guam">(GMT+10:00) Guam</option>
												<option value="Australia/Hobart">(GMT+10:00) Hobart</option>
												<option value="Pacific/Port_Moresby">(GMT+10:00) Port Moresby</option>
												<option value="Australia/Sydney">(GMT+10:00) Sydney</option>
												<option value="Asia/Yakutsk">(GMT+10:00) Yakutsk</option>
												<option value="Pacific/Noumea">(GMT+11:00) New Caledonia</option>
												<option value="Asia/Vladivostok">(GMT+11:00) Vladivostok</option>
												<option value="Pacific/Auckland">(GMT+12:00) Auckland/Wellington</option>
												<option value="Pacific/Fiji">(GMT+12:00) Fiji</option>
												<option value="Asia/Kamchatka">(GMT+12:00) Kamchatka</option>
												<option value="Asia/Magadan">(GMT+12:00) Magadan</option>
												<option value="Pacific/Majuro">(GMT+12:00) Marshall Is.</option>
												<option value="Pacific/Guadalcanal">(GMT+12:00) Solomon Is.</option>
												<option value="Pacific/Tongatapu">(GMT+13:00) Nuku'alofa</option>
												<option value="Pacific/Apia">(GMT+13:00) Samoa</option>
												<option value="Pacific/Fakaofo">(GMT+13:00) Tokelau Is.</option>
											</select>

											<span class="form-text text-muted"></span>
										</div>
										<div class="form-group">
											<label>Bim 360 Field Project Language<span class="text-danger">*</span></label>
											<select name="language" id="language" class="form-control form-control-solid form-control-lg">
												<option value="en">English</option>
												<option value="de">German</option>
												<option value="nl">Dutch</option>
												<option value="zh">Chinese</option>
												<option value="fr">French</option>
												<option value="de-CH">Swiss German</option>
											</select>
											<span class="form-text text-muted"></span>
										</div>

										<div class="row">
											<div class="col">
												<div class="form-group">
													<label>Created At</label>
													<input type="text" id="created_at" name="created_at" readonly="readonly" class="form-control form-control-solid form-control-lg" placeholder="Project Start Date" value="" />
													<span class="form-text text-muted"></span>
												</div>
											</div>
											<div class="col">
												<div class="form-group">
													<label>Updated At</label>
													<input type="text" id="updated_at" name="updated_at" readonly="readonly" class="form-control form-control-solid form-control-lg" placeholder="Project End Date" value="" />
													<span class="form-text text-muted"></span>
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>

							<!--begin::Wizard Actions-->
							<div class="d-flex justify-content-between border-top mt-5 pt-10">
								<div class="mr-2">
									<button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Cancel</button>
								</div>
								<div>
									<!-- <button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" onclick="saveProject();" data-wizard-type="action-next">Save and Continue</button> -->
									<button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" onclick="saveProject();">Save and Continue</button>
								</div>
							</div>
							<!--end::Wizard Actions-->
						</form>
						<!--end::Wizard Form-->
					</div>
				</div>
				<!--end::Wizard Body-->
			</div>
			<!--end::Wizard-->
		</div>

		<!--<div id="file12">
			<form action="/file-upload" class="dropzone"><div class="fallback"><input name="file" type="file" multiple /></div></form>
		</div>-->


	</div>


	<div class="modal fade" id="prefabModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-xl modal-dialog1" role="document">
			<div class="modal-content modal-content1">

				<div class="modal-body modal-body1">

					@include('prefab.prefabcontrols')
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-light-primary font-weight-bold text-left" data-dismiss="modal" aria-label="Close">Close</button>
					<button id="btnSaveEnquiryPrefab" type="button" class="btn btn-primary font-weight-bold text-left">Save</button>
				</div>

			</div>
		</div>
	</div>
</div>
@include('prefab.prefabmodals')



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



<script src="{{ asset('/js/pages/custom/wizard/wizard.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/dropzone.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/three.js') }}"></script>
<script src="{{ asset('/js/OrbitControls.js') }}"></script>
<script src="{{ asset('/plugins/custom/kanban/kanban.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pages/crud/datatables/basic/basic.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

@include('prefab.prefabscript')
<script>
	function init() {
		document.getElementById("id").value = '{{ $data->id }}';
		document.getElementById("name").value = '{{ $data->name }}';
		document.getElementById("start_date").value = '{{ $data->start_date }}';
		document.getElementById("end_date").value = '{{ $data->end_date }}';
		document.getElementById("project_type").value = '{{ $data->project_type }}';
		document.getElementById("value").value = '{{ $data->value }}';
		document.getElementById("currency").value = '{{ $data->currency }}';
		document.getElementById("status").value = '{{ $data->status }}';
		document.getElementById("job_number").value = '{{ $data->job_number }}';
		document.getElementById("address_line_1").value = '{{ $data->address_line_1 }}';
		document.getElementById("address_line_2").value = '{{ $data->address_line_2 }}';
		document.getElementById("city").value = '{{ $data->city }}';
		document.getElementById("country").value = '{{ $data->country }}';
		loadStatesSelectItems();
		document.getElementById("state_or_province").value = '{{ $data->state_or_province }}';
		document.getElementById("postal_code").value = '{{ $data->postal_code }}';
		document.getElementById("timezone").value = '{{ $data->timezone }}';
		document.getElementById("language").value = '{{ $data->language }}';
		document.getElementById("construction_type").value = '{{ $data->construction_type }}';
		document.getElementById("contract_type").value = '{{ $data->contract_type }}';
		document.getElementById("created_at").value = '{{ SetDateFormat($data->created_at) }}';
		document.getElementById("updated_at").value = '{{ $data->updated_at }}';
		document.getElementById("service_types").value = '{{ $data->service_types }}';
		document.getElementById("imgImage").src = '{{ $data->image }}';
	}

	function fillResponseData(data) {
		document.getElementById("id").value = data.id;
		document.getElementById("name").value = data.name;
		document.getElementById("start_date").value = data.start_date;
		document.getElementById("end_date").value = data.end_date;
		document.getElementById("project_type").value = data.project_type;
		document.getElementById("value").value = data.value;
		document.getElementById("currency").value = data.currency;
		document.getElementById("status").value = data.status;
		document.getElementById("job_number").value = data.job_number;
		document.getElementById("address_line_1").value = data.address_line_1;
		document.getElementById("address_line_2").value = data.address_line_2;
		document.getElementById("city").value = data.city;
		document.getElementById("country").value = data.country;
		loadStatesSelectItems();
		document.getElementById("state_or_province").value = data.state_or_province;
		document.getElementById("postal_code").value = data.postal_code;
		document.getElementById("timezone").value = data.timezone;
		document.getElementById("language").value = data.language;
		document.getElementById("construction_type").value = data.construction_type;
		document.getElementById("contract_type").value = data.contract_type;
		document.getElementById("created_at").value = data.created_at;
		document.getElementById("updated_at").value = data.updated_at;
		document.getElementById("service_types").value = data.service_types;
		document.getElementById("imgImage").src = data.image;
	}

	$(document).ready(function() {
		loadCountrySelectItems();
		init();
	});
</script>
@endsection