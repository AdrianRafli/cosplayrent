package models

import "gorm.io/gorm"

type Booking struct {
    gorm.Model
    UserID        uint   `gorm:"not null"`
    CostumeID     uint   `gorm:"not null"`
    StartDate     string `gorm:"type:date;not null"`
    EndDate       string `gorm:"type:date;not null"`
    TotalPrice    float64 `gorm:"type:decimal(10,2)"`
    Status        string  `gorm:"type:enum('pending', 'confirmed', 'completed', 'cancelled');not null"`
    PaymentMethod string  `gorm:"size:50"`
}

func (Booking) TableName() string {
	return "Booking"
}