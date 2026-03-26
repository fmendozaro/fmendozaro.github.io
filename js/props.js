/**
 * Created by Fer on 3/11/17.
 */
// ⚡ Bolt: Converted all project and cohort images from legacy formats (.png/.jpg) to .webp
// This significantly reduces the payload size of these dynamic sections (e.g., from 9.4MB to 1.6MB for projects).
const PROPS = {
    "experience": [
        {
            "lang": "java",
            "year": 2013,
            "extras": ["Java SE", "Java EE", "Spring Boot", "Hibernate", "Servlets", "JSP", "JSTL", "Thymeleaf", "EL", "Tomcat"]
        },
        {
            "lang": "javascript",
            "extras": ["node.js", "npm", "webpack", "jQuery", "angular"],
            "year": 2012
        },
        {
            "lang": "php",
            "year": 2013,
            "extras": ["Codeigniter", "Laravel"]
        },
        {
            "lang": "mysql",
            "year": 2013
        },
        {
            "lang": "sql server",
            "year": 2015
        },
        {
            "lang": "grails",
            "year": 2016
        }
    ],
    "projects": [
        {
            "name": "Alvarez Wedding Live",
            "imgUrl": "./img/projects/alvarezwedding.webp",
            "url": "https://alvarezwedding.live/",
            "description": "My cousins wedding RSVP website, using Vue.js 3 and some Adobe Generative AI for graphics, patterns and textures."
            
        },
        {
            "name": "OnlyFlans",
            "imgUrl": "./img/projects/OnlyFlans.webp",
            "url": "https://onlyflans.link",
            "description": "A mock blog posts website where users can post images and text content to share recipes and fun stuff related to flans around the world."
        },
        {
            "name": "FerMDB",
            "imgUrl": "./img/projects/fmdb.webp",
            "url": "https://play.google.com/store/apps/details?id=com.fer_mendoza.fermdb",
            "description": "A simple movie database app to manage favorites and check the latest trailers made on Android."
        },
        {
            "name": "Pokemon, Go Find Me",
            "imgUrl": "./img/projects/pogofindme.webp",
            "url": "https://pogofind.com",
            "description": "A progressive web app (PWA) for Pokémon Go players that makes easier the task of finding each other just by using their public in-game nicknames, coordinate lucky trades, raids, and more."
        },
        {
            "name": "Frest",
            "imgUrl": "./img/projects/frest.webp",
            "url": "https://frest.fer-mendoza.com",
            "description": "A progressive web app (PWA) developed built while taking the Mobile Web Specialist certification. This an app that offers the ability to add reviews and favorite restaurants using several front end technologies such as service workers and IndexedDB API"
        },
        {
            "name": "Friends 4 prisoners",
            "imgUrl": "./img/projects/f4p1.webp",
            "url": "https://friends4prisoners.com",
            "description": "A pen pal web platform to connect prisoners seeking other people to correspond with. This project has an ERP system in the backend to manage all the data and profiles of the application."
        },
        {
            "name": "SA Taco Radar",
            "imgUrl": "./img/projects/taco.webp",
            "url": "http://tacos.fer-mendoza.com",
            "description": "Taco Radar is a web app where you can find the nearest and finest real Mexican flavored tacos in San Antonio, Texas. If you ever wonder how a real taco tastes like, you can give it a shot and look for yourself."
        },
        {
            "name": "Spring Blog",
            "imgUrl": "./img/projects/blog.webp",
            "url": "http://blog.fer-mendoza.com",
            "description": "A blogging full-stack web application project made with Spring Boot for Codeup students to use as a reference during the Capstone process."
        }
    ],
    "generalExp": {
        "dev": 2011,
        "teach": 2012
    },
    "cohorts": [
        'lassen.webp',
        'wrangell.webp',
        'xanadu.webp',
        'andromeda.webp'
    ]
};