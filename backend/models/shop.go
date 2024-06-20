package models

import (
    "time"
    // "gorm.io/gorm"
)

type Shop struct {
    ID          uint           `gorm:"primaryKey"`
    UserID      uint
    ShopName    string         `gorm:"size:255"`
    City        string         `gorm:"size:255"`
    Address     string         `gorm:"size:255"`
    PhoneNumber string         `gorm:"size:255"`
    Image       string         `gorm:"size:255;default:'default.jpg'"`
    CreatedAt   time.Time
    UpdatedAt   time.Time
}

func (Shop) TableName() string {
    return "shops"
}
