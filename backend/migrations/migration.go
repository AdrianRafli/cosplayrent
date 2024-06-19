package migrations

import (
    "backend/models"
    "gorm.io/gorm"
)

func Migrate(db *gorm.DB) {
    db.AutoMigrate(&models.User{})
    db.AutoMigrate(&models.Shop{})
    db.AutoMigrate(&models.Costume{})
    db.AutoMigrate(&models.Booking{})
}
