package models

import "gorm.io/gorm"

type Shop struct {
    gorm.Model
    UserID     uint   `gorm:"not null"`
    ShopName   string `gorm:"size:100;not null"`
    Description string `gorm:"type:text"`
    Address    string `gorm:"type:text"`
    Contact    string `gorm:"size:50"`
}

func (Shop) TableName() string {
	return "Shop"
}