package models

import (
    "time"
    "gorm.io/gorm"
)

type Order struct {
    ID            uint           `gorm:"primaryKey"`
    Desa          string         `gorm:"size:255"`
    Kelurahan     string         `gorm:"size:255"`
    Kecamatan     string         `gorm:"size:255"`
    Kabkot        string         `gorm:"size:255"`
    Address       string         `gorm:"size:255"`
    PaymentMethod string         `gorm:"size:255"`
    Status        string         `gorm:"size:255;default:'dalam proses'"`
    UserID        uint
    ShopID        uint
    CostumeID     uint
    CreatedAt     time.Time
    UpdatedAt     time.Time
}

func (Order) TableName() string {
    return "orders"
}

// Migrasi untuk Order
func MigrateOrder(db *gorm.DB) {
    db.AutoMigrate(&Order{})
}
