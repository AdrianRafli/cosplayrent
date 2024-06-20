package models

import (
    "time"
    "gorm.io/gorm"
)

type Cart struct {
    ID        uint           `gorm:"primaryKey"`
    UserID    uint
    ShopID    uint
    CostumeID uint
    DateStart time.Time
    DateEnd   time.Time
    CreatedAt time.Time
    UpdatedAt time.Time
}

func (Cart) TableName() string {
    return "carts"
}

// Migrasi untuk Cart
func MigrateCart(db *gorm.DB) {
    db.AutoMigrate(&Cart{})
}
