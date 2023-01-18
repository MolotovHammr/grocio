-- CreateTable
CREATE TABLE `UserDataKeys` (
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `userId` INTEGER NOT NULL,
    `linkedUser` INTEGER NOT NULL,
    `key` TEXT NOT NULL,
    `userDataId` INTEGER NOT NULL,

    UNIQUE INDEX `UserDataKeys_userDataId_key`(`userDataId`),
    PRIMARY KEY (`id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- AddForeignKey
ALTER TABLE `UserDataKeys` ADD CONSTRAINT `UserDataKeys_userId_fkey` FOREIGN KEY (`userId`) REFERENCES `User`(`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

-- AddForeignKey
ALTER TABLE `UserDataKeys` ADD CONSTRAINT `UserDataKeys_userDataId_fkey` FOREIGN KEY (`userDataId`) REFERENCES `UserData`(`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
