export default function send(
  res,
  statusCode=200,
  data=null,
  success=true,
  desc=null
) {
  return res.status(statusCode).json({success, data, desc});
};
