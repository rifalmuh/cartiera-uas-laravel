-- Cartiera UAS database export
-- Generated: 2026-06-30 17:31:50
PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;

DROP TABLE IF EXISTS "articles";
CREATE TABLE "articles" ("id" integer primary key autoincrement not null, "title" varchar not null, "content" text not null, "image" varchar, "created_at" datetime, "updated_at" datetime);
INSERT INTO "articles" ("id", "title", "content", "image", "created_at", "updated_at") VALUES ('1', 'Cara Memadukan Polo Shirt untuk Gaya Smart Casual', 'Polo shirt menjadi pilihan serbaguna untuk tampilan smart casual. Padukan warna netral dengan chino berpotongan rapi, lalu gunakan sepatu loafers atau sneakers minimalis untuk menjaga kesan modern dan nyaman.', 'images/km1.png', '2026-06-20 01:19:10', '2026-06-20 01:19:10');
INSERT INTO "articles" ("id", "title", "content", "image", "created_at", "updated_at") VALUES ('2', 'Mengapa Material Berkualitas Menentukan Kenyamanan', 'Kualitas material memengaruhi sirkulasi udara, daya tahan, dan bentuk pakaian setelah digunakan. Cartiera memilih material yang nyaman agar setiap koleksi tetap terasa ringan dan terlihat rapi sepanjang hari.', 'images/Secondary-black.png', '2026-06-20 01:19:10', '2026-06-20 01:19:10');
INSERT INTO "articles" ("id", "title", "content", "image", "created_at", "updated_at") VALUES ('3', 'Mengenal Gaya Minimalis Pria Modern', 'Gaya minimalis mengutamakan siluet bersih, warna yang mudah dipadukan, dan detail fungsional. Dengan pilihan item yang tepat, lemari pakaian menjadi lebih efisien tanpa kehilangan karakter personal.', 'images/km2.png', '2026-06-20 01:19:10', '2026-06-20 01:19:10');

DROP TABLE IF EXISTS "cache";
CREATE TABLE "cache" ("key" varchar not null, "value" text not null, "expiration" integer not null, primary key ("key"));

DROP TABLE IF EXISTS "cache_locks";
CREATE TABLE "cache_locks" ("key" varchar not null, "owner" varchar not null, "expiration" integer not null, primary key ("key"));

DROP TABLE IF EXISTS "companies";
CREATE TABLE "companies" ("id" integer primary key autoincrement not null, "name" varchar not null, "description" text not null, "address" varchar not null, "created_at" datetime, "updated_at" datetime);
INSERT INTO "companies" ("id", "name", "description", "address", "created_at", "updated_at") VALUES ('1', 'PT Cartiera Indonesia', 'Cartiera adalah brand fashion lokal yang menghadirkan menswear modern, minimalis, dan elegan dengan fokus pada kualitas material, detail desain, serta kenyamanan.', 'Ruko Rodeo Blok C No. 8-9, Gading Serpong, Tangerang, Banten', '2026-07-01 00:14:46', '2026-07-01 00:14:46');

DROP TABLE IF EXISTS "contacts";
CREATE TABLE "contacts" ("id" integer primary key autoincrement not null, "email" varchar not null, "phone" varchar not null, "address" text not null, "created_at" datetime, "updated_at" datetime);
INSERT INTO "contacts" ("id", "email", "phone", "address", "created_at", "updated_at") VALUES ('1', 'cartieraindonesia@gmail.com', '0821 3060 9314', 'Ruko Rodeo Blok C No. 8-9, Gading Serpong, Tangerang', '2026-07-01 00:14:46', '2026-07-01 00:14:46');

DROP TABLE IF EXISTS "failed_jobs";
CREATE TABLE "failed_jobs" ("id" integer primary key autoincrement not null, "uuid" varchar not null, "connection" text not null, "queue" text not null, "payload" text not null, "exception" text not null, "failed_at" datetime not null default CURRENT_TIMESTAMP);

DROP TABLE IF EXISTS "fashion_collections";
CREATE TABLE "fashion_collections" ("id" integer primary key autoincrement not null, "id_fashion" varchar not null, "gambar" varchar, "nama_item" varchar not null, "ukuran" varchar not null, "warna" varchar not null, "brand" varchar not null, "created_at" datetime, "updated_at" datetime);
INSERT INTO "fashion_collections" ("id", "id_fashion", "gambar", "nama_item", "ukuran", "warna", "brand", "created_at", "updated_at") VALUES ('1', 'FSH-001', 'images/fashion/fsh-001-urban-work-jacket.png', 'Cartiera Urban 2in1 Work Jacket Dan Kemeja Pria Lengan Pendek Jaket Boxy Pria Full Zipper YKK', 'S, M, L, XL, XXL', 'Pendek - Black, Panjang - Black', 'Cartiera', '2026-07-01 00:14:46', '2026-07-01 00:31:33');
INSERT INTO "fashion_collections" ("id", "id_fashion", "gambar", "nama_item", "ukuran", "warna", "brand", "created_at", "updated_at") VALUES ('2', 'FSH-002', 'images/fashion/fsh-002-flex-polo-half-zipper.png', 'Cartiera Flex Polo Shirt Pria Half Zipper 280 GSM Baju Polo Kaos Kerah Pria Lengan Pendek Anti Kusut Stretchy Adem', 'S, M, L, XL, XXL', 'Pria - Black, Pria - Brown, Pria - White, Wanita - Black', 'Cartiera', '2026-07-01 00:14:46', '2026-07-01 00:31:33');
INSERT INTO "fashion_collections" ("id", "id_fashion", "gambar", "nama_item", "ukuran", "warna", "brand", "created_at", "updated_at") VALUES ('3', 'FSH-003', 'images/fashion/fsh-003-flo-polo-shirt.png', 'Cartiera FLO Polo Shirt Pria Kaos Kerah Pria Lengan Pendek Lentur Adem Tidak Transparan', 'S, M, L, XL, XXL', 'Jet Black', 'Cartiera', '2026-07-01 00:14:46', '2026-07-01 00:31:33');
INSERT INTO "fashion_collections" ("id", "id_fashion", "gambar", "nama_item", "ukuran", "warna", "brand", "created_at", "updated_at") VALUES ('4', 'FSH-004', 'images/fashion/fsh-004-danke-chinos.png', 'Cartiera Danke Celana Chinos Panjang Pria Straight Fit Anti UV 2 Way Stretch', '28, 30, 32, 34, 36', 'Black, Grey, Cream, Olive', 'Cartiera', '2026-07-01 00:31:33', '2026-07-01 00:31:33');
INSERT INTO "fashion_collections" ("id", "id_fashion", "gambar", "nama_item", "ukuran", "warna", "brand", "created_at", "updated_at") VALUES ('5', 'FSH-005', 'images/fashion/fsh-005-everyday-pants.png', 'Cartiera Everyday Pants Celana Panjang Pria Celana Formal Dan Casual Tapered Fit Anti UV 4 Way Stretch Premium', '28, 30, 32, 34, 36', 'Black, Cream, Grey, Olive', 'Cartiera', '2026-07-01 00:31:33', '2026-07-01 00:31:33');
INSERT INTO "fashion_collections" ("id", "id_fashion", "gambar", "nama_item", "ukuran", "warna", "brand", "created_at", "updated_at") VALUES ('6', 'FSH-006', 'images/fashion/fsh-006-loco-polo-scuba.png', 'Loco Polo Cartiera Scuba 280 GSM Oversize Polo Shirt Pria / Kaos Kerah Lengan Pendek', 'S, M, L, XL, XXL', 'Jet Black, Brown, White, Grey, Maroon', 'Cartiera', '2026-07-01 00:31:33', '2026-07-01 00:31:33');

DROP TABLE IF EXISTS "job_batches";
CREATE TABLE "job_batches" ("id" varchar not null, "name" varchar not null, "total_jobs" integer not null, "pending_jobs" integer not null, "failed_jobs" integer not null, "failed_job_ids" text not null, "options" text, "cancelled_at" integer, "created_at" integer not null, "finished_at" integer, primary key ("id"));

DROP TABLE IF EXISTS "jobs";
CREATE TABLE "jobs" ("id" integer primary key autoincrement not null, "queue" varchar not null, "payload" text not null, "attempts" integer not null, "reserved_at" integer, "available_at" integer not null, "created_at" integer not null);

DROP TABLE IF EXISTS "migrations";
CREATE TABLE "migrations" ("id" integer primary key autoincrement not null, "migration" varchar not null, "batch" integer not null);
INSERT INTO "migrations" ("id", "migration", "batch") VALUES ('1', '0001_01_01_000000_create_users_table', '1');
INSERT INTO "migrations" ("id", "migration", "batch") VALUES ('2', '0001_01_01_000001_create_cache_table', '1');
INSERT INTO "migrations" ("id", "migration", "batch") VALUES ('3', '0001_01_01_000002_create_jobs_table', '1');
INSERT INTO "migrations" ("id", "migration", "batch") VALUES ('4', '2026_04_29_145423_create_companies_table', '1');
INSERT INTO "migrations" ("id", "migration", "batch") VALUES ('5', '2026_04_29_145429_create_contacts_table', '1');
INSERT INTO "migrations" ("id", "migration", "batch") VALUES ('6', '2026_05_01_034554_create_articles_table', '1');
INSERT INTO "migrations" ("id", "migration", "batch") VALUES ('7', '2026_05_01_035035_create_services_table', '1');
INSERT INTO "migrations" ("id", "migration", "batch") VALUES ('8', '2026_06_30_160000_update_users_table_for_username_login', '2');
INSERT INTO "migrations" ("id", "migration", "batch") VALUES ('9', '2026_06_30_170000_create_fashion_collections_table', '2');

DROP TABLE IF EXISTS "password_reset_tokens";
CREATE TABLE "password_reset_tokens" ("email" varchar not null, "token" varchar not null, "created_at" datetime, primary key ("email"));

DROP TABLE IF EXISTS "services";
CREATE TABLE "services" ("id" integer primary key autoincrement not null, "name" varchar not null, "description" text not null, "image" varchar, "created_at" datetime, "updated_at" datetime);
INSERT INTO "services" ("id", "name", "description", "image", "created_at", "updated_at") VALUES ('1', 'Essential Polo Collection', 'Polo shirt premium dengan siluet modern, material nyaman, dan warna serbaguna untuk aktivitas formal maupun kasual.', 'images/km1.png', '2026-06-20 01:19:10', '2026-06-20 01:19:10');
INSERT INTO "services" ("id", "name", "description", "image", "created_at", "updated_at") VALUES ('2', 'Modern Koko Collection', 'Koleksi koko berkarakter minimalis dengan detail elegan untuk tampilan rapi pada berbagai momen spesial.', 'images/km2.png', '2026-06-20 01:19:10', '2026-06-20 01:19:10');
INSERT INTO "services" ("id", "name", "description", "image", "created_at", "updated_at") VALUES ('3', 'Fashion Consultation', 'Layanan konsultasi pemilihan produk dan padu padan gaya yang sesuai dengan kebutuhan serta karakter pelanggan.', 'images/Secondary-black.png', '2026-06-20 01:19:10', '2026-06-20 01:19:10');

DROP TABLE IF EXISTS "sessions";
CREATE TABLE "sessions" ("id" varchar not null, "user_id" integer, "ip_address" varchar, "user_agent" text, "payload" text not null, "last_activity" integer not null, primary key ("id"));

DROP TABLE IF EXISTS "users";
CREATE TABLE "users" ("id" integer primary key autoincrement not null, "name" varchar not null, "email" varchar not null, "password" varchar not null, "remember_token" varchar, "created_at" datetime, "updated_at" datetime, "username" varchar);
INSERT INTO "users" ("id", "name", "email", "password", "remember_token", "created_at", "updated_at", "username") VALUES ('1', 'Administrator Cartiera', 'admin@cartiera.id', '$2y$12$q3q/7g2tikhpkKM/5luvSuP.J6cwTRGYE1hLusleoq20zlnwGZg/q', NULL, '2026-06-20 01:19:10', '2026-07-01 00:14:46', 'admin');

COMMIT;
PRAGMA foreign_keys=ON;
