PRAGMA foreign_keys=ON;
CREATE TABLE IF NOT EXISTS species(id TEXT PRIMARY KEY,display_order INTEGER UNIQUE NOT NULL,slug TEXT UNIQUE NOT NULL,name_ja TEXT NOT NULL,name_bn TEXT NOT NULL,scientific_name TEXT NOT NULL,family TEXT NOT NULL,group_ja TEXT NOT NULL,group_slug TEXT NOT NULL,updated TEXT NOT NULL);
CREATE TABLE IF NOT EXISTS articles(species_id TEXT NOT NULL REFERENCES species(id),lang TEXT CHECK(lang IN ('ja','bn')),features TEXT NOT NULL,sex_differences TEXT NOT NULL,size TEXT NOT NULL,islands TEXT NOT NULL,habitat TEXT NOT NULL,details TEXT NOT NULL,larvae TEXT NOT NULL,PRIMARY KEY(species_id,lang));
CREATE TABLE IF NOT EXISTS sources(id INTEGER PRIMARY KEY,url TEXT UNIQUE NOT NULL,title TEXT NOT NULL,accessed TEXT NOT NULL);
CREATE TABLE IF NOT EXISTS species_sources(species_id TEXT REFERENCES species(id),source_id INTEGER REFERENCES sources(id),PRIMARY KEY(species_id,source_id));
CREATE TABLE IF NOT EXISTS assets(id TEXT PRIMARY KEY,taxon TEXT,reference_file TEXT,illustration_file TEXT,artist TEXT,license TEXT,license_url TEXT,source_url TEXT,derivative_license TEXT);
CREATE VIEW IF NOT EXISTS encyclopedia_ja AS SELECT s.*,a.features,a.sex_differences,a.size,a.islands,a.habitat,a.details,a.larvae FROM species s JOIN articles a ON a.species_id=s.id WHERE a.lang='ja';
CREATE VIEW IF NOT EXISTS encyclopedia_bn AS SELECT s.*,a.features,a.sex_differences,a.size,a.islands,a.habitat,a.details,a.larvae FROM species s JOIN articles a ON a.species_id=s.id WHERE a.lang='bn';
