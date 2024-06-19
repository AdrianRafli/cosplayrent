package models

import "gorm.io/gorm"

type Costume struct {
    gorm.Model
    ShopID      uint    `gorm:"not null"`
    CostumeName string  `gorm:"size:100;not null"`
    Description string  `gorm:"type:text"`
    Price       float64 `gorm:"type:decimal(10,2)"`
    Picture     string  `gorm:"size:255"`
    Size        string  `gorm:"size:50"`
    Available   bool    `gorm:"default:true"`
}

func (Costume) TableName() string {
	return "Costume"
}
