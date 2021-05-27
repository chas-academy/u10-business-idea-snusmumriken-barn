import axios from "axios";
import authHeader from "./auth-header";
import { getCurrentUser } from "./auth.service";

const API_URL = "https://snusare-backend.herokuapp.com/api/auth/";
const currentuser = getCurrentUser()

export default function saveFavourite(snusID) {
    let bodyFormData = new FormData();
    bodyFormData.append('flavours_id', snusID);
    bodyFormData.append('users_id', currentuser.user.id);


    return axios({
        method: "post",
        url: `${API_URL}store-favourites`,
        data: bodyFormData,
        headers: {
            "Content-Type": "multipart/form-data",
            ...authHeader()
        }
    })
}
