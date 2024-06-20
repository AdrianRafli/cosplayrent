package models

import (
    "time"
    // "gorm.io/gorm"
)

type Costume struct {
    ID          uint           `gorm:"primaryKey"`
    ShopID      uint
    Name        string         `gorm:"size:255"`
    Description string         `gorm:"type:text"`
    Price       string         `gorm:"size:255"`
    Day         int
    Category    string         `gorm:"size:255"`
    Size        string         `gorm:"size:255"`
    Available   string         `gorm:"size:255"`
    Image       *string
    CreatedAt   time.Time
    UpdatedAt   time.Time
}

func (Costume) TableName() string {
    return "costumes"
}