package models

import (
    "time"
    // "gorm.io/gorm"
)

type User struct {
    ID                uint           `gorm:"primaryKey"`
    Name              string         `gorm:"size:255"`
    Email             string         `gorm:"uniqueIndex;size:255"`
    Role              string         `gorm:"size:255"`
    EmailVerifiedAt   *time.Time
    Password          string         `gorm:"size:255"`
    RememberToken     string         `gorm:"size:100"`
    CreatedAt         time.Time
    UpdatedAt         time.Time
}

func (User) TableName() string {
    return "users"
}

