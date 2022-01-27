-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- ---
-- Table 'devices'
-- 
-- ---

DROP TABLE IF EXISTS devices;
		
CREATE TABLE devices (
  id INTEGER  AUTO_INCREMENT,
  name VARCHAR DEFAULT NULL,
  created_at TIMESTAMP DEFAULT NULL,
  updated_at TIMESTAMP DEFAULT NULL);

-- ---
-- Table 'modules'
-- 
-- ---

DROP TABLE IF EXISTS modules;
		
CREATE TABLE modules (
  id INTEGER  AUTO_INCREMENT,
  name VARCHAR NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL);

-- ---
-- Table 'components'
-- 
-- ---

DROP TABLE IF EXISTS components;
		
CREATE TABLE components (
  id INTEGER  AUTO_INCREMENT,
  name VARCHAR(255) NULL DEFAULT NULL,
  description MEDIUMTEXT NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL);

-- ---
-- Table 'platforms'
-- 
-- ---

DROP TABLE IF EXISTS platforms;
		
CREATE TABLE platforms (
  id INTEGER  AUTO_INCREMENT,
  name VARCHAR(255) NULL DEFAULT NULL,
  domain VARCHAR(255) NULL DEFAULT NULL,
  key_id INTEGER NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL);

-- ---
-- Table 'plugins'
-- 
-- ---

DROP TABLE IF EXISTS plugins;
		
CREATE TABLE plugins (
  id INTEGER  AUTO_INCREMENT,
  name VARCHAR NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL);

-- ---
-- Table 'libraries'
-- 
-- ---

DROP TABLE IF EXISTS libraries;
		
CREATE TABLE libraries (
  id INTEGER  AUTO_INCREMENT,
  name VARCHAR(255) NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL);

-- ---
-- Table 'tools'
-- 
-- ---

DROP TABLE IF EXISTS tools;
		
CREATE TABLE tools (
  id INTEGER  AUTO_INCREMENT,
  name VARCHAR(255) NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL);

-- ---
-- Table 'networks'
-- 
-- ---

DROP TABLE IF EXISTS networks;
		
CREATE TABLE networks (
  id INTEGER  AUTO_INCREMENT,
  name VARCHAR(255) NULL DEFAULT NULL,
  type VARCHAR(255) NULL DEFAULT NULL,
  last_discovered DATETIME NULL DEFAULT NULL,
  local_address VARCHAR NULL DEFAULT NULL,
  gateway VARCHAR(255) NULL DEFAULT NULL,
  dns VARCHAR(255) NULL DEFAULT NULL,
  bssid VARCHAR(255) NULL DEFAULT NULL,
  speed VARCHAR(255) NULL DEFAULT NULL,
  access VARCHAR(255) NULL DEFAULT NULL,
  isp VARCHAR(255) NULL DEFAULT NULL,
  internet_address VARCHAR(255) NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL);

-- ---
-- Table 'servers'
-- 
-- ---

DROP TABLE IF EXISTS servers;
		
CREATE TABLE servers (
  id INTEGER  AUTO_INCREMENT,
  name VARCHAR(255) NULL DEFAULT NULL,
  service VARCHAR(255) NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL);

-- ---
-- Table 'sites'
-- 
-- ---

DROP TABLE IF EXISTS sites;
		
CREATE TABLE sites (
  id INTEGER  AUTO_INCREMENT,
  name INTEGER NULL DEFAULT NULL,
  domain VARCHAR(255) NULL DEFAULT NULL,
  title VARCHAR(255) NULL DEFAULT NULL,
  description MEDIUMTEXT NULL DEFAULT NULL,
  keyword MEDIUMTEXT NULL DEFAULT NULL,
  tag MEDIUMTEXT NULL DEFAULT NULL,
  url MEDIUMTEXT NULL DEFAULT NULL,
  icon MEDIUMTEXT NULL DEFAULT NULL,
  path MEDIUMTEXT NULL DEFAULT NULL,
  access VARCHAR NULL DEFAULT NULL,
  address VARCHAR NULL DEFAULT NULL,
  screenshot MEDIUMTEXT NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL);

-- ---
-- Table 'databases'
-- 
-- ---

DROP TABLE IF EXISTS databases;
		
CREATE TABLE databases (
  id INTEGER  AUTO_INCREMENT,
  name VARCHAR(255) NULL DEFAULT NULL,
  type VARCHAR(255) NULL DEFAULT NULL,
  hostname VARCHAR(255) NULL DEFAULT NULL,
  username VARCHAR(255) NULL DEFAULT NULL,
  password VARCHAR NULL DEFAULT NULL,
  port VARCHAR(255) NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL);

-- ---
-- Table 'bookmarks'
-- 
-- ---

DROP TABLE IF EXISTS bookmarks;
		
CREATE TABLE bookmarks (
  id INTEGER  AUTO_INCREMENT,
  title VARCHAR(255) NULL DEFAULT NULL,
  description MEDIUMTEXT NULL DEFAULT NULL,
  resource MEDIUMTEXT NULL DEFAULT NULL,
  tag MEDIUMTEXT NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL);

-- ---
-- Table 'mirrors'
-- 
-- ---

DROP TABLE IF EXISTS mirrors;
		
CREATE TABLE mirrors (
  id INTEGER  AUTO_INCREMENT,
  name INTEGER NULL DEFAULT NULL,
  domain VARCHAR(255) NULL DEFAULT NULL,
  title VARCHAR(255) NULL DEFAULT NULL,
  description MEDIUMTEXT NULL DEFAULT NULL,
  keyword MEDIUMTEXT NULL DEFAULT NULL,
  tag MEDIUMTEXT NULL DEFAULT NULL,
  url MEDIUMTEXT NULL DEFAULT NULL,
  icon MEDIUMTEXT NULL DEFAULT NULL,
  path MEDIUMTEXT NULL DEFAULT NULL,
  access VARCHAR NULL DEFAULT NULL,
  address VARCHAR NULL DEFAULT NULL,
  screenshot MEDIUMTEXT NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at DATETIME NULL DEFAULT NULL);

-- ---
-- Table 'network_nodes'
-- 
-- ---

DROP TABLE IF EXISTS network_nodes;
		
CREATE TABLE network_nodes (
  id INTEGER  AUTO_INCREMENT,
  node_id INTEGER NULL DEFAULT NULL,
  ip_address VARCHAR(255) NULL DEFAULT NULL,
  mac_address VARCHAR(255) NULL DEFAULT NULL,
  machine_name VARCHAR(255) NULL DEFAULT NULL,
  internal_name VARCHAR(255) NULL DEFAULT NULL,
  device_name VARCHAR(255) NULL DEFAULT NULL,
  icon MEDIUMTEXT NULL DEFAULT NULL,
  image MEDIUMTEXT NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL);

-- ---
-- Table 'repositories'
-- 
-- ---

DROP TABLE IF EXISTS repositories;
		
CREATE TABLE repositories (
  id INTEGER  AUTO_INCREMENT,
  name VARCHAR NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL);

-- ---
-- Table 'connections'
-- 
-- ---

DROP TABLE IF EXISTS connections;
		
CREATE TABLE connections (
  id INTEGER  AUTO_INCREMENT,
  name VARCHAR NULL DEFAULT NULL,
  description MEDIUMTEXT NULL DEFAULT NULL,
  type VARCHAR(255) NULL DEFAULT NULL,
  username INTEGER NULL DEFAULT NULL,
  password VARCHAR(255) NULL DEFAULT NULL,
  hostname VARCHAR(255) NULL DEFAULT NULL,
  protocol VARCHAR(255) NULL DEFAULT NULL,
  port VARCHAR(255) NULL DEFAULT NULL,
  icon MEDIUMTEXT NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL);

-- ---
-- Table 'nodes'
-- 
-- ---

DROP TABLE IF EXISTS nodes;
		
CREATE TABLE nodes (
  id INTEGER  AUTO_INCREMENT,
  name VARCHAR(255) NULL DEFAULT NULL,
  description MEDIUMTEXT NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL);

-- ---
-- Table 'attributes'
-- 
-- ---

DROP TABLE IF EXISTS attributes;
		
CREATE TABLE attributes (
  id INTEGER  AUTO_INCREMENT,
  node_id INTEGER(11) NULL DEFAULT NULL,
  attribute_name VARCHAR(255) NULL DEFAULT NULL,
  attribute_value VARCHAR(255) NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL);

-- ---
-- Table 'services'
-- 
-- ---

DROP TABLE IF EXISTS services;
		
CREATE TABLE services (
  id INTEGER  AUTO_INCREMENT,
  name VARCHAR(255) NULL DEFAULT NULL,
  address VARCHAR(255) NULL DEFAULT NULL,
  port VARCHAR(255) NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL);

-- ---
-- Table 'systems'
-- 
-- ---

DROP TABLE IF EXISTS systems;
		
CREATE TABLE systems (
  id INTEGER  AUTO_INCREMENT,
  name VARCHAR(255) NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL);

-- ---
-- Table 'agents'
-- 
-- ---

DROP TABLE IF EXISTS agents;
		
CREATE TABLE agents (
  id INTEGER  AUTO_INCREMENT,
  name VARCHAR NULL DEFAULT NULL,
  data MEDIUMTEXT NULL DEFAULT NULL,
  key_id INTEGER NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL);

-- ---
-- Table 'users'
-- 
-- ---

DROP TABLE IF EXISTS users;
		
CREATE TABLE users (
  id INTEGER  AUTO_INCREMENT,
  name VARCHAR(255) NULL DEFAULT NULL,
  email VARCHAR(255) NULL DEFAULT NULL,
  permission_id INTEGER NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL);

-- ---
-- Table 'roles'
-- 
-- ---

DROP TABLE IF EXISTS roles;
		
CREATE TABLE roles (
  id INTEGER  AUTO_INCREMENT,
  name VARCHAR(255) NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL);

-- ---
-- Table 'permissions'
-- 
-- ---

DROP TABLE IF EXISTS permissions;
		
CREATE TABLE permissions (
  id INTEGER  AUTO_INCREMENT,
  name VARCHAR(255) NULL DEFAULT NULL,
  access VARCHAR NULL DEFAULT NULL,
  levels INTEGER(11) NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL);

-- ---
-- Table 'keys'
-- 
-- ---

DROP TABLE IF EXISTS keys;
		
CREATE TABLE keys (
  id INTEGER  AUTO_INCREMENT,
  signature MEDIUMTEXT NULL DEFAULT NULL,
  type VARCHAR(255) NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL);

-- ---
-- Table 'urls'
-- 
-- ---

DROP TABLE IF EXISTS urls;
		
CREATE TABLE urls (
  id INTEGER  AUTO_INCREMENT,
  url MEDIUMTEXT NULL DEFAULT NULL,
  key_id INTEGER NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL);

-- ---
-- Table 'pages'
-- 
-- ---

DROP TABLE IF EXISTS pages;
		
CREATE TABLE pages (
  id INTEGER  AUTO_INCREMENT,
  name VARCHAR NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL);

-- ---
-- Table 'documents'
-- 
-- ---

DROP TABLE IF EXISTS documents;
		
CREATE TABLE documents (
  id INTEGER  AUTO_INCREMENT,
  name VARCHAR(255) NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL);

-- ---
-- Table 'visits'
-- 
-- ---

DROP TABLE IF EXISTS visits;
		
CREATE TABLE visits (
  id INTEGER  AUTO_INCREMENT,
  url VARCHAR(255) NULL DEFAULT 'NOT NULL',
  get VARCHAR(255) NULL DEFAULT 'NOT NULL',
  post VARCHAR(255) NULL DEFAULT 'NOT NULL',
  input VARCHAR(255) NULL DEFAULT 'NOT NULL',
  ua VARCHAR(255) NULL DEFAULT 'NOT NULL',
  dt VARCHAR(255) NULL DEFAULT 'NOT NULL',
  ip VARCHAR(255) NULL DEFAULT '127.0.0.1',
  created_at DATETIME NULL DEFAULT NULL,
  updated_at DATETIME NULL DEFAULT NULL);


-- ---
-- Table Properties
-- ---

-- ALTER TABLE devices ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE modules ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE components ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE platforms ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE plugins ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE libraries ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE tools ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE networks ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE servers ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE sites ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE databases ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE bookmarks ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE mirrors ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE network_nodes ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE repositories ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE connections ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE nodes ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE attributes ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE services ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE systems ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE agents ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE users ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE roles ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE permissions ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE keys ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE urls ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE pages ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE documents ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE visits ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO devices (id,name,created_at,updated_at) VALUES
-- ('','','','');
-- INSERT INTO modules (id,name,created_at,updated_at) VALUES
-- ('','','','');
-- INSERT INTO components (id,name,description,created_at,updated_at) VALUES
-- ('','','','','');
-- INSERT INTO platforms (id,name,domain,key_id,created_at,updated_at) VALUES
-- ('','','','','','');
-- INSERT INTO plugins (id,name,created_at,updated_at) VALUES
-- ('','','','');
-- INSERT INTO libraries (id,name,created_at,updated_at) VALUES
-- ('','','','');
-- INSERT INTO tools (id,name,created_at,updated_at) VALUES
-- ('','','','');
-- INSERT INTO networks (id,name,type,last_discovered,local_address,gateway,dns,bssid,speed,access,isp,internet_address,created_at,updated_at) VALUES
-- ('','','','','','','','','','','','','','');
-- INSERT INTO servers (id,name,service,created_at,updated_at) VALUES
-- ('','','','','');
-- INSERT INTO sites (id,name,domain,title,description,keyword,tag,url,icon,path,access,address,screenshot,created_at,updated_at) VALUES
-- ('','','','','','','','','','','','','','','');
-- INSERT INTO databases (id,name,type,hostname,username,password,port,created_at,updated_at) VALUES
-- ('','','','','','','','','');
-- INSERT INTO bookmarks (id,title,description,resource,tag,created_at,updated_at) VALUES
-- ('','','','','','','');
-- INSERT INTO mirrors (id,name,domain,title,description,keyword,tag,url,icon,path,access,address,screenshot,created_at,updated_at) VALUES
-- ('','','','','','','','','','','','','','','');
-- INSERT INTO network_nodes (id,node_id,ip_address,mac_address,machine_name,internal_name,device_name,icon,image,created_at,updated_at) VALUES
-- ('','','','','','','','','','','');
-- INSERT INTO repositories (id,name,created_at,updated_at) VALUES
-- ('','','','');
-- INSERT INTO connections (id,name,description,type,username,password,hostname,protocol,port,icon,created_at,updated_at) VALUES
-- ('','','','','','','','','','','','');
-- INSERT INTO nodes (id,name,description,created_at,updated_at) VALUES
-- ('','','','','');
-- INSERT INTO attributes (id,node_id,attribute_name,attribute_value,created_at,updated_at) VALUES
-- ('','','','','','');
-- INSERT INTO services (id,name,address,port,created_at,updated_at) VALUES
-- ('','','','','','');
-- INSERT INTO systems (id,name,created_at,updated_at) VALUES
-- ('','','','');
-- INSERT INTO agents (id,name,data,key_id,created_at,updated_at) VALUES
-- ('','','','','','');
-- INSERT INTO users (id,name,permission_id,created_at,updated_at) VALUES
-- ('','','','','');
-- INSERT INTO roles (id,name,created_at,updated_at) VALUES
-- ('','','','');
-- INSERT INTO permissions (id,name,access,levels,created_at,updated_at) VALUES
-- ('','','','','','');
-- INSERT INTO keys (id,signature,type,created_at,updated_at) VALUES
-- ('','','','','');
-- INSERT INTO urls (id,url,key_id,created_at,updated_at) VALUES
-- ('','','','','');
-- INSERT INTO pages (id,name,created_at,updated_at) VALUES
-- ('','','','');
-- INSERT INTO documents (id,name,created_at,updated_at) VALUES
-- ('','','','');
-- INSERT INTO visits (id,url,get,post,input,ua,dt,ip,created_at,updated_at) VALUES
-- ('','','','','','','','','','');
