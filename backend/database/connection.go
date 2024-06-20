package database

import (
	"backend/models"
	"log"

	"gorm.io/driver/mysql"
	"gorm.io/gorm"
)

var DB *gorm.DB

func Connect() {
    dsn := "root:@tcp(127.0.0.1:3306)/cosplayrent?charset=utf8mb4&parseTime=True&loc=Local"
    db, err := gorm.Open(mysql.Open(dsn), &gorm.Config{})
    if err != nil {
        log.Fatal("Failed to connect to database:", err)
    }

    DB = db
}

func GetDB() *gorm.DB {
    return DB
}

func MigrateUser(db *gorm.DB) {
    db.AutoMigrate(&models.User{})
}

func MigrateShop(db *gorm.DB) {
    db.AutoMigrate(&models.Shop{})
}