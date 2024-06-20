package models

import (
    "time"
    // "gorm.io/gorm"
)

type Order struct {
    ID             uint      `gorm:"primaryKey" json:"id"`
    Desa           string    `json:"desa"`
    Kelurahan      string    `json:"kelurahan"`
    Kecamatan      string    `json:"kecamatan"`
    Kabkot         string    `json:"kabkot"`
    Address        string    `json:"address"`
    PaymentMethod  string    `json:"payment_method"`
    Status         string    `json:"status" gorm:"default:'dalam proses'"`
    UserID         uint      `json:"user_id"`
    ShopID         uint      `json:"shop_id"`
    CostumeID      uint      `json:"costume_id"`
    CreatedAt      time.Time `json:"created_at"`
    UpdatedAt      time.Time `json:"updated_at"`
    User           User      `json:"user"`
    Shop           Shop      `json:"shop"`
    Costume        Costume   `json:"costume"`
}

func (Order) TableName() string {
    return "orders"
}

